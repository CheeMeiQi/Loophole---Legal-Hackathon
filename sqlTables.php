<!-- Code for all SQL tables will be found here -->
<?php

// Users table (for all users include the lawyers and beneficiaries)
//TODO: Do we need the registration dates?
"CREATE TABLE users (
    userid INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(256) NOT NULL,
    useremail VARCHAR(256) NOT NULL,
    pwd VARCHAR(256) NOT NULL
)"

// For lawyers
//TODO: Still need to ask for volunteer experience?
"CREATE TABLE lawyers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    userid INT(11) NOT NULL, 
    firstName VARCHAR(256) NOT NULL,
    lastName VARCHAR(256) NOT NULL,
    gender VARCHAR(256) NOT NULL,
    firm VARCHAR(256) NOT NULL,
    workNumber VARCHAR(256), //TODO: Is it okay to leave this as null?
    workEmail VARCHAR(256) NOT NULL,
    profilPic VARBINARY(MAX),
    remainingCases INT(11) NOT NULL,
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
    transcript ,//TODO: PRESHI - Determine type
    profilPic VARBINARY(MAX),
    waitPeriod INT(11) NOT NULL,
    caseTaken INT(11) NOT NULL, 
    latestRequest INT(11) NOT NULL,
    remainingDays INT(11) NOT NULL,
    lawyer INT(11) NOT NULL,
    caseCompletedReq INT(11) NOT NULL,
    caseCompletedConfirm INT(11) NOT NULL,
)"

// Practice areas table (We will track based on the userid, will be -1 by default and then updated to the lawyers' quotes)

"CREATE TABLE practiceAreas (
    id FLOAT AUTO_INCREMENT PRIMARY KEY,
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
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    firmName VARCHAR(256) NOT NULL,
)"

// For legal clinics
"CREATE TABLE legalClinics (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    clinicName VARCHAR(256) NOT NULL,
    firmName VARCHAR(256) NOT NULL,
)"
?>

<script>

    // We will run for each person
    function match(beneficiaryId) {
        <?php
            $beneficiarySql = "SELECT "
        ?>
    }

</script>