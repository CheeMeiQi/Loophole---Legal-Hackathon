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
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    userid INT(11) NOT NULL, 
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
    latestReqExpiry INT(11), //TODO: Datetime
    reqLawyerId INT(11) NOT NULL, //TODO: Can have as -1 if no lawyer to currently request?
    finalLawyerId INT(11) NOT NULL,
    caseDoneReqExpiry INT(11) NOT NULL, //TODO: Datetime
    caseDoneConfirm INT(11) NOT NULL,
)"

"CREATE TABLE rejections (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    beneficiaryId INT(11) NOT NULL,
    lawyerId INT(11) NOT NULL
)"

// Practice areas table (We will track based on the userid, will be -1 by default and then updated to the lawyers' quotes)
// TODO: Set defualt values
"CREATE TABLE practiceAreas (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    userid FLOAT, 
    crimDefence FLOAT, 
    commCrime FLOAT, 
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
)"

//TODO: Also what if laypersons do not know their areas very well and choose wrongly?
// Will be 0 by default and updated to 1 if they need help
"CREATE TABLE helpAreas (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    userid INT(11), 
    crimDefence INT(11), 
    commCrime INT(11), 
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
    firmName VARCHAR(256) NOT NULL,
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

<script>

    // Bing's trigger function: This whole process (Step 1-9) has to be run everytime a beneficiary clicks 'Refer me a lawyer' and every few hours (6 hours) and when a new lawyer joins and when a lawyer rejects a case

    // We will run for each person
    function match() {
        // Step 1: Sort beneficiaries according to urgency score (datetime diff + categories) (put in an array)
        // Step 2: Create for loop to iterate through each beneficiary (run 'match' function for each beneficiary)
        // Step 3: Run through all 34 columns of beneficiary to find out which areas they need help with (aka the value is 1)
        // Step 4: Select command to select all the lawyers where the area of law != -1
        // Step 5: Obtain all available lawyers (remainingCases > 0)
        // Step 6: Obtain all the lawyers that rejected the user and remove them from the list of available lawyers
        // Step 7: Find the sum of the relevant practice areas for each of the remaining lawyers
        // Step 8: Create a variable to track the diff between the lawyer's "quote" and the beneficiary's budget. When the new diff (new diff must be strictly non-negative) is < than the old diff, swap the layer and update the variable.
        // Step 9: Match! Remove beneficiary from the Step 1 array and update their latestReqExpiry date. -1 for remaingCases for lawyer.
        // Step 10: If no match, apology pop-up and ask them to wait for a few hours. 

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