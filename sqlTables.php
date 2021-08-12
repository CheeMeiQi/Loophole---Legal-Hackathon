<!-- Code for all SQL tables will be found here -->
<?php

// Users table (for all users include the lawyers and beneficiaries)
//TODO: Do we need the registration dates?
"CREATE TABLE users (
    userId INT(11) AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(256) NOT NULL,
    userEmail VARCHAR(256) NOT NULL,
    pwd VARCHAR(256) NOT NULL,
    pwdChanged INT(11) NOT NULL
)"

// For lawyers
"CREATE TABLE lawyers (
    userId INT(11) PRIMARY KEY NOT NULL, 
    firstName VARCHAR(256) NOT NULL,
    lastName VARCHAR(256) NOT NULL,
    gender VARCHAR(256) NOT NULL,
    firm VARCHAR(256) NOT NULL,
    workNumber VARCHAR(256),
    workEmail VARCHAR(256) NOT NULL,
    profilePic VARBINARY(MAX),
    remainingCases INT(11) NOT NULL,
    CONSTRAINT lawyers_FK FOREIGN KEY (userId) REFERENCES users(userId)
)"

//For beneficiaries
//TODO: Need to still ask for income level, phone number and email? Also we need to run the algorithm once the first request is unsucessful right? Bc the 2nd option lawyer might be suddenly occupied
//TODO: Also are we strictly only allowing them to go with their top match?
"CREATE TABLE beneficiaries (
    userId INT(11) NOT NULL, 
    firstName VARCHAR(256) NOT NULL,
    lastName VARCHAR(256) NOT NULL,
    age INT(11) NOT NULL, 
    gender VARCHAR(256) NOT NULL,
    brief VARCHAR(256) NOT NULL,
    phoneNum VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
    transcript VARBINARY(MAX), //TODO: PRESHI - Determine type
    profilePic VARBINARY(MAX),
    waitPeriod INT(11) NOT NULL,
    court INT(11) NOT NULL,
    abuse INT(11) NOT NULL,
    urgencyScore INT(11) NOT NULL,
    budget FLOAT NOT NULL,
    caseTaken INT(11) NOT NULL, 
    firstReqDate , //TODO: Datetime
    latestReqExpiry INT(11), //TODO: Datetime, will be null if lawyer rejects first
    reqLawyerId INT(11) NOT NULL, //TODO: Can have as -1 if no lawyer to currently request?
    finalLawyerId INT(11) NOT NULL,
    caseDoneReqExpiry INT(11) NOT NULL, //TODO: Datetime
    caseDoneConfirm INT(11) NOT NULL,
    CONSTRAINT beneficiaries_FK FOREIGN KEY (userId) REFERENCES users(userId)
)"

"CREATE TABLE rejections (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    beneficiaryId INT(11) NOT NULL,
    lawyerId INT(11) NOT NULL,
)"

// Practice areas table (We will track based on the userid, will be -1 by default and then updated to the lawyers' quotes)
// TODO: Set defualt values
"CREATE TABLE practiceAreas (
    userId INT(11) NOT NULL, 
    crimDefence FLOAT, 
    commCrime FLOAT,
    magComplaint FLOAT, 
    cyberCrime FLOAT, 
    harassment FLOAT, 
    divorce FLOAT, 
    syariahDivorce FLOAT, 
    divorceInEng FLOAT, 
    preNuptial FLOAT, 
    personalProt FLOAT, 
    adoption FLOAT, 
    lpa FLOAT, 
    probate FLOAT, 
    wills FLOAT, 
    muslimWills FLOAT, 
    mentalCap FLOAT, 
    trusts FLOAT, 
    deedPolls FLOAT, 
    notary FLOAT, 
    iou FLOAT, 
    bankruptcy FLOAT, 
    commissioner FLOAT, 
    powAttorney FLOAT, 
    debtRecovery FLOAT, 
    emplyDisputes FLOAT, 
    medNeglce FLOAT, 
    civilLit FLOAT, 
    copyright FLOAT, 
    personalInjury FLOAT, 
    defamtion FLOAT, 
    mcst FLOAT, 
    conveyancing FLOAT, 
    landlord FLOAT, 
    renovation FLOAT,  
    CONSTRAINT pracAreas_FK FOREIGN KEY (userId) REFERENCES users(userId)
)"

//TODO: Also what if laypersons do not know their areas very well and choose wrongly?
// Will be 0 by default and updated to 1 if they need help
"CREATE TABLE helpAreas (
    userId INT(11) NOT NULL, 
    crimDefence INT(11), 
    commCrime INT(11), 
    magCompliant INT(11),
    cyberCrime INT(11), 
    harassment INT(11), 
    divorce INT(11), 
    syariahDivorce INT(11), 
    divorceInEng INT(11), 
    preNuptial INT(11), 
    personalProt INT(11), 
    adoption INT(11), 
    lpa INT(11), 
    probate INT(11), 
    wills INT(11), 
    muslimWills INT(11), 
    mentalCap INT(11), 
    trusts INT(11), 
    deedPolls INT(11), 
    notary INT(11), 
    iou INT(11), 
    bankruptcy INT(11), 
    commissioner INT(11), 
    powAttorney INT(11), 
    debtRecovery INT(11), 
    emplyDisputes INT(11), 
    medNeglce INT(11), 
    civilLit INT(11), 
    copyright INT(11), 
    personalInjury INT(11), 
    defamtion INT(11), 
    mcst INT(11), 
    conveyancing INT(11), 
    landlord INT(11), 
    renovation INT(11),  
    CONSTRAINT helpAreas_FK FOREIGN KEY (userId) REFERENCES users(userId)
)"

// For firms
//TODO: What other details do we need to track?
"CREATE TABLE firms (
    firmId INT(11) AUTO_INCREMENT PRIMARY KEY,
    firmName VARCHAR(256) NOT NULL,
)"

// For legal clinics
"CREATE TABLE legalClinics (
    clinicId INT(11) AUTO_INCREMENT PRIMARY KEY,
    clinicName VARCHAR(256) NOT NULL,
    firmName VARCHAR(256) NOT NULL
)"

"CREATE TABLE registeredLawFirms (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    firmName VARCHAR(256) NOT NULL,
    officialEmail VARCHAR(256) NOT NULL
)"

"CREATE TABLE registeredLegalClinics (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    clinicName VARCHAR(256) NOT NULL,
    officialEmail VARCHAR(256) NOT NULL
)"

?>

<?php
    $user = 'root'; 
    $pass = '';
    $db='loophole';
    $conn = mysqli_connect('localhost', $user, $pass, $db);
?>

<script>

    // Bing's trigger function: This whole process (Step 1-9) has to be run everytime a beneficiary clicks 'Refer me a lawyer' and every few hours (6 hours) and when a new lawyer joins and when a lawyer rejects a case

    // We will run for each person
    function match() {
        // Step 1: Sort beneficiaries according to urgency score (datetime diff + categories) (put in an array)
        let currB, currCourt, currAbuse, currScore, tempArr, bArr;
        <?php
            $beneficiaries = "SELECT * FROM beneficiaries WHERE reqLawyerId = -1";
            $results = mysqli_query($conn, $beneficiaries);

            if ($results) {
                $resultCheck = mysqli_num_rows($results);
                $data = array();
                if ($resultCheck > 0) {
                    echo 'console.log("I have at least 1 result");';
                    while ($row = mysqli_fetch_assoc($results)) {
                        $data[] = $row;   
                    }
                    foreach($data as $single) {
                        $currB = $single['userId'];
                        echo "currB = parseInt($currB);";
                        $currCourt = $single['court'];
                        echo "currCourt = parseInt($currCourt);";
                        $currAbuse = $single['abuse'];
                        echo "currAbuse = parseInt($currAbuse);";
                        //TODO: Clarify on the date component for the score
                        $currScore = $currCourt + (2 * $currAbuse);
                        echo "tempArr = [$currB, $currScore];";
                        echo "bArr.push(tempArr);";
                    }
                }
            }
        ?>
        // Sorting beneficiaries
        bArr.sort(function(first, second) {
            return second[1] - first[1];
        });

        function lower(number) {
            if (number == 0) {
                return -1;
            } else {
                return 0;
            }
        }



        // Step 2: Create for loop to iterate through each beneficiary (run 'match' function for each beneficiary)
        //for (let i = 0; i < bArr.length; i++) {
        // Step 3: Run through all 34 columns of beneficiary to find out which areas they need help with (aka the value is 1)
            let a1, a2, a3, a4, a5, a6, a7, a8, a9, a10, a11, a12, a13, a14, a15, a16, a17, a18, a19, a20, a21, a22, a23, a24, a25, a26, a27, a28, a29, a30, a31, a32, a33, a34;

            let beneficiary = bArr[i][0];

            <?php
                $areas = "SELECT * FROM helpAreas WHERE userid = bArr[i][0]";
                // TODO: Need to submit a form here? bc userid is in js and we need it as a php variable
                $results = mysqli_query($conn, $beneficiaries);
    
                if ($results) {
                    $resultCheck = mysqli_num_rows($results);
                    $data = array();
                    if ($resultCheck > 0) {
                        echo 'console.log("I have at least 1 result");';
                        while ($row = mysqli_fetch_assoc($results)) {
                            $data[] = $row;   
                        }
                        foreach($data as $single) {
                            $a1 = $single['crimDefence'];
                            echo "a1 = lower(parseInt($a1));"; //parseInt: 1
                            $a2 = $single['commCrime'];
                            echo "a2 = lower(parseInt($a2));"; //parseInt: 0
                            $a3 = $single['magComplaint'];
                            echo "a3 = lower(parseInt($a3));";
                            $a4 = $single['cyberCrime'];
                            echo "a4 = lower(parseInt($a4));";
                            $a5 = $single['harassment'];
                            echo "a5 = lower(parseInt($a5));";
                            $a6 = $single['divorce'];
                            echo "a6 = lower(parseInt($a6));";
                            $a7 = $single['syariahDivorce'];
                            echo "a7 = lower(parseInt($a7));";
                            $a8 = $single['divorceInEng'];
                            echo "a8 = lower(parseInt($a8));";
                            $a9 = $single['preNuptial'];
                            echo "a9 = lower(parseInt($a9));";
                            $a10 = $single['personalProt'];
                            echo "a10 = lower(parseInt($a10));";
                            $a11 = $single['adoption'];
                            echo "a11 = lower(parseInt($a11));";
                            $a12 = $single['lpa'];
                            echo "a12 = lower(parseInt($a12));";
                            $a13 = $single['probate'];
                            echo "a13 = lower(parseInt($a13));";
                            $a14 = $single['wills'];
                            echo "a14 = lower(parseInt($a14));";
                            $a15 = $single['muslimWills'];
                            echo "a15 = lower(parseInt($a15));";
                            $a16 = $single['mentalCap'];
                            echo "a16 = lower(parseInt($a16));";
                            $a17 = $single['trusts'];
                            echo "a17 = lower(parseInt($a17));";
                            $a18 = $single['deedPolls'];
                            echo "a18 = lower(parseInt($a18));";
                            $a19 = $single['notary'];
                            echo "a19 = lower(parseInt($a19));";
                            $a20 = $single['iou'];
                            echo "a20 = lower(parseInt($a20));";
                            $a21 = $single['bankruptcy'];
                            echo "a21 = lower(parseInt($a21));";
                            $a22 = $single['commissioner'];
                            echo "a22 = lower(parseInt($a22));";
                            $a23 = $single['powAttorney'];
                            echo "a23 = lower(parseInt($a23));";
                            $a24 = $single['debtRecovery'];
                            echo "a24 = lower(parseInt($a24));";
                            $a25 = $single['emplyDisputes'];
                            echo "a25 = lower(parseInt($a25));";
                            $a26 = $single['medNeglce'];
                            echo "a26 = lower(parseInt($a26));";
                            $a27 = $single['civilLit'];
                            echo "a27 = lower(parseInt($a27));";
                            $a28 = $single['copyright'];
                            echo "a28 = lower(parseInt($a28));";
                            $a29 = $single['personalInjury'];
                            echo "a29 = lower(parseInt($a29));";
                            $a30 = $single['defamation'];
                            echo "a30 = lower(parseInt($a30));";
                            $a31 = $single['mcst'];
                            echo "a31 = lower(parseInt($a31));";
                            $a32 = $single['conveyancing'];
                            echo "a32 = lower(parseInt($a32));";
                            $a33 = $single['landlord'];
                            echo "a33 = lower(parseInt($a33));";
                            $a34 = $single['renovation'];
                            echo "a34 = lower(parseInt($a34));";
                        }

                        $rightLawyers = "SELECT * FROM helpAreas WHERE $crimDefence >= a1 AND $commCrime >= a2 AND $magComplaint >= a3 AND $cyberCrime >= a4 AND $harassment >= a5 AND $divorce >= a6 AND $syariahDivorce >= a7 AND $divorceInEng >= a8 AND $preNuptial >= a9 AND $personalProt >= a10 AND $adoption >= a11 AND $lpa >= a12 AND $probate >= a13 AND $wills >= a14 AND $muslimWills >= a15 AND $mentalCap >= a16 AND $trusts >= a17 AND $deedPolls >= a18 AND $notary >= a19 AND $iou >= a20 AND $bankruptcy >= a21 AND $commissioner >= a22 AND $powAttorney >= a23 AND $debtRecovery >= a24 AND $emplyDisputes >= a25 AND $megNeglce >= a26 AND $civilLit >= a27 AND $copyright >= a28 AND $personalInjury >= a29 AND $defamtion >= a30 AND $mcst >= a31 AND $conveyancing >= a32 AND $landlord >= a33 AND $renovation >= a34;";

                        $finalLawyers = mysqli_query($conn, $rightLawyers);
    
                        if ($finalLawyers) {
                            $resultCheck = mysqli_num_rows($finalLawyers);
                            $data = array();
                            if ($resultCheck > 0) {
                                echo 'console.log("I have at least 1 result");';
                                while ($row = mysqli_fetch_assoc($finalLawyers)) {
                                    $data[] = $row;   
                                }
                                foreach($data as $single) {
                                    $a1 = $single['crimDefence'];
                                
                            }
                        }
            ?>
        // Step 4: Select command to select all the lawyers where the area of law != -1
        // Step 5: Obtain all available lawyers (remainingCases > 0)
        // Step 6: Obtain all the lawyers that rejected the user and remove them from the list of available lawyers
        // Step 7: Find the sum of the relevant practice areas for each of the remaining lawyers
        // Step 8: Create a variable to track the diff between the lawyer's "quote" and the beneficiary's budget. When the new diff (new diff must be strictly non-negative) is < than the old diff, swap the layer and update the variable.
        // Step 9: Match! Remove beneficiary from the Step 1 array and update their latestReqExpiry date. -1 for remaingCases for lawyer.
        // Step 10: If no match, apology pop-up and ask them to wait for a few hours. 
        }

    }

    // Bing to run a trigger function once a day for this as well
    // Terminate account function
    // So (if it is the expiry date and confirmation still 0) or (confirmation is 1), then delete profile from sql
    // 

    // Withdraw accounts function (for beneficiaries and lawyers)
    // This function will be available if you are a lawyer have no cases or if you 

    // Reject function (what happens when a lawyer rejects a beneficiary?)
    // Lawyer's remainingCases increases by 1 and beneficiary gets thrown back into the algo

</script>