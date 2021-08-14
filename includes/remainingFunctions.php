<?php
    // Terminate account function for beneficiaries
    // So (if it is the expiry date and confirmation still 0) or (confirmation is 1), then delete profile from sql
    function terminate($bId) {
        $caseConfirmDetails = "SELECT * FROM beneficiaries WHERE userId = $bId;";
        $confirmation = mysqli_query($conn, $caseConfirmDetails);

        if ($caseConfirmDetails) {
            $resultCheck = mysqli_num_rows($caseConfirmDetails);
            $data = array();

            if ($resultCheck > 0) {
                echo 'console.log("I have found the beneficiary record");';
                while ($row = mysqli_fetch_assoc($caseConfirmDetails)) {
                    $data[] = $row;   
                }
                foreach($data as $single) {
                    $caseDoneReqExpiry = $single["caseDoneReqExpiry"];
                    $caseDoneConfirm = (int) $single["caseDoneConfirm"];

                    if ($caseDoneConfirm == 1 || new DateTime() >= $caseDoneReqExpiry) {
                        $terminate = "DELETE * FROM users where userId = $bId;";
                        $removeB = "DELETE * FROM beneficiaries where userId = $bId;";
                        $removeRejected = "DELETE * FROM rejections where beneficiaryId = $bId;";
                        $removeHelpAreas = "DELETE * FROM helpAreas where userId = $bId;";

                        mysqli_query($conn, $terminate);
                        mysqli_query($conn, $removeB);
                        mysqli_query($conn, $removeRejected);
                        mysqli_query($conn, $removeHelpAreas);
                    }
                }
            }
        }
    }

    // Withdraw accounts function (for beneficiaries and lawyers) 
    //TODO: $userid will be the user's id as I am assuming this will be done from their profile
    function withdrawLawyer() {
        $currCases = "SELECT * FROM beneficiaries WHERE finalLawyerId = $userid;";
        $cases = mysqli_query($conn, $currCases);

        if ($cases) {
            $resultCheck = mysqli_num_rows($cases);
            $data = array();

            if ($resultCheck > 0) {
                // There are ongoing cases and thus cannot withdraw
                echo 'console.log("Sorry, you are unable to withdraw your account at the moment as you have at least ongoing case. If you have completed all your cases, please check with your beneficiaries on whether they have replied to the case confirmation request sent by you. You may check on pending requests at the case confirmation requests page. Thank you");';
            } else {
                $terminate = "DELETE * FROM users where userId = $userid;";
                $removeLawyer = "DELETE * FROM lawyers where userId = $userid;";
                $removeRejected = "DELETE * FROM rejections where lawyerId = $userid;";
                $removePracAreas = "DELETE * FROM practiceAreas where userId = $userid;";

                mysqli_query($conn, $terminate);
                mysqli_query($conn, $removeLawyer);
                mysqli_query($conn, $removeRejected);
                mysqli_query($conn, $removePracAreas);
            }
        }
    }

    //TODO: $userid will be the user's id as I am assuming this will be done from their profile
    function withdrawBeneficiary() {
        $bDetails = "SELECT * FROM beneficiaries WHERE userId = $userid;";
        $details = mysqli_query($conn, $bDetails);

        if ($details) {
            $resultCheck = mysqli_num_rows($details);
            $data = array();

            if ($resultCheck > 0) {
                echo 'console.log("I have found the beneficiary record");';
                while ($row = mysqli_fetch_assoc($details)) {
                    $data[] = $row;   
                }
                foreach($data as $single) {
                    $finalLawyerId = (int) $single["finalLawyerId"];
                    // If no lawyer has been officially attached to their case, beneficiary can withdraw the case
                    if ($finalLawyerId == -1) {
                        $terminate = "DELETE * FROM users where userId = $userid;";
                        $removeB = "DELETE * FROM beneficiaries where userId = $userid;";
                        $removeRejected = "DELETE * FROM rejections where beneficiaryId = $userid;";
                        $removeHelpAreas = "DELETE * FROM helpAreas where userId = $userid;";

                        mysqli_query($conn, $terminate);
                        mysqli_query($conn, $removeB);
                        mysqli_query($conn, $removeRejected);
                        mysqli_query($conn, $removeHelpAreas);
                    } else {
                        echo 'console.log("Sorry, you are unable to withdraw your profile as a lawyer is now looking into your case. If you wish to not pursue your case further, please inform your lawyer and request them to send a case confirmation request that will allow you to withdraw your profile. Thank you.");';
                    }
                }
            }
        }
    }

    // Reject function (what happens when a lawyer rejects a beneficiary?)
    // Lawyer's remainingCases increases by 1 and beneficiary gets thrown back into the algo
    function reject($bId) {
        $reject = "UPDATE beneficiaries SET reqLawyerId = -1 WHERE userId = $bId;";
        mysqli_query($conn, $reject);

        //TODO: userid in this case refers to lawyer's userid bc we are assuming this will be done from his or her profile
        //TODO: retrieve the remaining number of cases and + 1
        $updateRemainingCases = "UPDATE lawyers SET remainingCases =  WHERE userId = $userid;";
        mysqli_query($conn, $updateRemainingCases);
    }

    // Accepting function (what happens when a lawyer accepts a beneficiary?)
    function accept($bId) {
        //TODO: userid in this case refers to lawyer's userid bc we are assuming this will be done from his or her profile
        $accept = "UPDATE beneficiaries SET finalLawyerId = $userid WHERE userId = $bId;";
        mysqli_query($conn, $accept);
    }

    // Registering accounts (beneficiaries, legal clinics and law firms)
    function registerBeneficiary() {
        $insertSql = "INSERT INTO users(userName, userEmail, pwd) VALUES ($userName, $userEmail, $pwd);";
        mysqli_query($conn, $insertSql);
    }
    
    function registerLegalClinic() {
        $verification = "SELECT * FROM registeredLegalClinics WHERE clinicName = $clinicName;";
        $details = mysqli_query($conn, $verification);

        if ($details) {
            $resultCheck = mysqli_num_rows($details);
            $data = array();

            if ($resultCheck > 0) {
                echo 'console.log("This is a registered legal clinic.");';
                while ($row = mysqli_fetch_assoc($details)) {
                    $data[] = $row;   
                }
                foreach($data as $single) {
                    $officialEmail = $single["officialEmail"];

                    $register = "INSERT INTO legalClinics(clinicName, officialEmail) VALUE ($clinicName, $clinicEmail);";

                    mysqli_query($conn, $register);
                }
            } else {
                echo 'console.log("Sorry, we are currently unable to verify you as a registered legal clinic in Singapore. Kindly email us at _____ to to register your legal clinic with us. Thank you.");';
            }
        }
    }

    function registerLawFirm() {
        $verification = "SELECT * FROM registeredLawFirms WHERE firmName = $clinicName;";
        $details = mysqli_query($conn, $verification);

        if ($details) {
            $resultCheck = mysqli_num_rows($details);
            $data = array();

            if ($resultCheck > 0) {
                echo 'console.log("This is a registered law firm.");';
                while ($row = mysqli_fetch_assoc($details)) {
                    $data[] = $row;   
                }
                foreach($data as $single) {
                    $officialEmail = $single["officialEmail"];

                    $register = "INSERT INTO lawFirms(firmName, officialEmail) VALUE ($firmName, $firmEmail);";

                    mysqli_query($conn, $register);
                }
            } else {
                echo 'console.log("Sorry, we are currently unable to verify you as a registered law firm in Singapore. Kindly email us at _____ to to register your law firm with us. Thank you.");';
            }
        }
    }

    function registerLawyers() {
        //TODO: Not too sure about the exact manipulation bc we are doing it based on an excel sheet
        $insertSql = "INSERT INTO users(userName, userEmail, pwd) VALUES ($userName, $userEmail, $pwd);";
        mysqli_query($conn, $insertSql);
    }

    // Setting up profiles (beneficiaries and lawyers)
    function setBeneficiaryProfile() {
        //TODO: possible for transcript, profilepic and phoneNum to be null
        //TODO: need to figure out how exactly we will be uploading transcript and profile pic into mysql
        //TODO: $areasArr will be a array that has 34 spaces with -1. The slot will be updated with the beneficiary selects it

        // Supposed to upload the transcript
        // URL: https://www.youtube.com/watch?v=3OUTgnaezNY
        // $transcript = rand(1000, 10000) . "-" . $_FILES["file"]["name"];
        // $tName = $_FILES["files"]["tmp_name"];
        // $uplodesDir = '../transcripts';
        // move_uploaded_file($tName, $uplodesDir."/".$transcript);

        // $profilePicName = rand(1000, 10000). "-" . $_FILES['profilePic']['name'];
        // $target = '../images/' . $profilePicName;
        // if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $target)) {

        // } else {
            
        // }

        //$bInsert = "INSERT INTO beneficiaries(userId, firstName, lastName, age, gender, brief, phoneNum, email, transcript, profilePic, waitPeriod, court, abuse, budget, reqLawyerId, finalLawyerId, caseDoneConfirm) VALUES (-5, '$firstName', '$lastName', $age, '$gender', '$brief', $phoneNum, '$email', '$transcript', '$profilePicName', $waitPeriod, $court, $abuse, $budget, -1, -1, 0);";

        $bInsert = "INSERT INTO beneficiaries(userId, firstName, lastName, age, gender, brief, phoneNum, email, waitPeriod, court, abuse, budget, firstReqDate, latestReqExpiry, reqLawyerId, finalLawyerId, caseDoneReqExpiry, caseDoneConfirm) VALUES (-5, '$firstName', '$lastName', $age, '$gender', '$brief', $phoneNum, '$email', $waitPeriod, $court, $abuse, $budget, null, null, -1, -1, null, 0);";

        $helpAreasInsert = "INSERT INTO helpAreas(userId, crimDefence, commCrime, magComplaint, cyberCrime, harassment, divorce, syariahDivorce, divorceInEng, preNuptial, personalProt, adoption, lpa, probate, wills, muslimWills, mentalCap, trusts, deedPolls, notary, iou, bankruptcy, commissioner, powAttorney, debtRecovery, emplyDisputes, medNeglce, civilLit, copyright, personalInjury, defamation, mcst, conveyancing, landlord, renovation) VALUES (-5, $areasArr[0], $areasArr[1], $areasArr[2], $areasArr[3], $areasArr[4], $areasArr[5], $areasArr[6], $areasArr[7], $areasArr[8], $areasArr[9], $areasArr[10], $areasArr[11], $areasArr[12], $areasArr[13], $areasArr[14], $areasArr[15], $areasArr[16], $areasArr[17], $areasArr[18], $areasArr[19], $areasArr[20], $areasArr[21], $areasArr[22], $areasArr[23], $areasArr[24], $areasArr[25], $areasArr[26], $areasArr[27], $areasArr[28], $areasArr[29], $areasArr[30], $areasArr[31], $areasArr[32], $areasArr[33]);";

        // $helpAreasInsert = "INSERT INTO helpAreas(crimDefence, commCrime, magComplaint, cyberCrime, harassment, divorce, syariahDivorce, divorceInEng, preNuptial, personalProt, adoption, lpa, probate, wills, muslimWills, mentalCap, trusts, deedPolls, notary, iou, bankruptcy, commissioner, powAttorney, debtRecovery, emplyDisputes, medNeglce, civilLit, copyright, personalInjury, defamation, mcst, conveyancing, landlord, renovation) VALUES ($areasArr[0], $areasArr[1], $areasArr[2], $areasArr[3], $areasArr[4], $areasArr[5], $areasArr[6], $areasArr[7], $areasArr[8], $areasArr[9], $areasArr[10], $areasArr[11], $areasArr[12], $areasArr[13], $areasArr[14], $areasArr[15], $areasArr[16], $areasArr[17], $areasArr[18], $areasArr[19], $areasArr[20], $areasArr[21], $areasArr[22], $areasArr[23], $areasArr[24], $areasArr[25], $areasArr[26], $areasArr[27], $areasArr[28], $areasArr[29], $areasArr[30], $areasArr[31], $areasArr[32], $areasArr[33]);";

        mysqli_query($conn, $bInsert);
        mysqli_query($conn, $helpAreasInsert);
    }

    function setLawyerProfile() {
        //TODO: possible for profilepic and workNum to be null
        //TODO: need to figure out how exactly we will be uploading profile pic into mysql
        //TODO: $areasArr will be a array that has 34 spaces with -1. The slot will be updated with the actual 'quote' when the lawyer selects it

        $lawyerInsert = "INSERT INTO lawyers(firstName, lastName, gender, firm, workNum, workEmail, profilePic, remainingCases) VALUES ($firstName, $lastName, $gender, $workNum, $workEmail, $profilePic, $remainingCases);";

        $pracAreasInsert = "INSERT INTO helpAreas(crimDefence, commCrime, magComplaint, cyberCrime, harassment, divorce, syariahDivorce, divorceInEng, preNuptial, personalProt, adoption, lpa, probate, wills, muslimWills, mentalCap, trusts, deedPolls, notary, iou, bankruptcy, commissioner, powAttorney, debtRecovery, emplyDisputes, medNeglce, civilLit, copyright, personalInjury, defamation, mcst, conveyancing, landlord, renovation) VALUES ($areasArr[0], $areasArr[1], $areasArr[2], $areasArr[3], $areasArr[4], $areasArr[5], $areasArr[6], $areasArr[7], $areasArr[8], $areasArr[9], $areasArr[10], $areasArr[11], $areasArr[12], $areasArr[13], $areasArr[14], $areasArr[15], $areasArr[16], $areasArr[17], $areasArr[18], $areasArr[19], $areasArr[20], $areasArr[21], $areasArr[22], $areasArr[23], $areasArr[24], $areasArr[25], $areasArr[26], $areasArr[27], $areasArr[28], $areasArr[29], $areasArr[30], $areasArr[31], $areasArr[32], $areasArr[33]);";

        mysqli_query($conn, $lawyerInsert);
        mysqli_query($conn, $pracAreasInsert);
    }

    // Edit profile functions?

    // To display profile pic
    // $profilePic=$rowgetuser['profilePic'];
    // if($profilePic=="" || $profilePic == null){
    //     echo "<div><img src=\"img/user.png\" id=\"profilepic\" alt=\"profilepic\" width=\"250px\" height=\"250px\"></div>";
    // }
    // else{
    //     echo "<div><img src=\"userprofilepic/$profilePic\" id=\"profilepic\" alt=\"profilepic\" width=\"250px\" height=\"250px\"></div>";
    // }
?>