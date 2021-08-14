<!-- Code for all SQL tables will be found here -->
<?php

// Users table (for all users include the lawyers and beneficiaries)
//TODO: Do we need the registration dates?
"CREATE TABLE users (
    userId INT(11) AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(256) NOT NULL,
    userEmail VARCHAR(256) NOT NULL,
    pwd VARCHAR(256) NOT NULL
)"
//pwdChanged INT(11) NOT NULL //TODO: Why is this here? Need?

// For lawyers
// Need to track firm id?
"CREATE TABLE lawyers (
    userId INT(11) PRIMARY KEY NOT NULL, 
    firstName VARCHAR(256) NOT NULL,
    lastName VARCHAR(256) NOT NULL,
    gender VARCHAR(256) NOT NULL,
    firm VARCHAR(256) NOT NULL,
    workNum VARCHAR(256),
    workEmail VARCHAR(256) NOT NULL,
    profilePic VARCHAR(256),
    remainingCases INT(11) NOT NULL,
    CONSTRAINT lawyers_FK FOREIGN KEY (userId) REFERENCES users(userId)
)"
//VARBINARY(MAX),
//For beneficiaries
// Need to click beneficiary id
//TODO: Need to still ask for income level, phone number and email? Also we need to run the algorithm once the first request is unsucessful right? Bc the 2nd option lawyer might be suddenly occupied
//TODO: Also are we strictly only allowing them to go with their top match?
"CREATE TABLE beneficiaries (
    userId INT(11) PRIMARY KEY NOT NULL, 
    firstName VARCHAR(256) NOT NULL,
    lastName VARCHAR(256) NOT NULL,
    age INT(11) NOT NULL, 
    gender VARCHAR(256) NOT NULL,
    brief VARCHAR(256) NOT NULL,
    phoneNum VARCHAR(256),
    email VARCHAR(256) NOT NULL,
    transcript VARCHAR(256),
    profilePic VARCHAR(256),
    waitPeriod INT(11) NOT NULL,
    court INT(11) NOT NULL,
    abuse INT(11) NOT NULL,
    budget FLOAT NOT NULL,
    firstReqDate DATETIME DEFAULT NULL,
    latestReqExpiry DATETIME DEFAULT NULL, //TODO: Will be null if lawyer rejects first
    reqLawyerId INT(11) NOT NULL, //TODO: Can have as -1 if no lawyer to currently request?
    finalLawyerId INT(11) NOT NULL,
    caseDoneReqExpiry DATETIME DEFAULT NULL,
    caseDoneConfirm INT(11) NOT NULL,
    CONSTRAINT beneficiaries_FK FOREIGN KEY (userId) REFERENCES users(userId)
)"

//caseTaken INT(11) NOT NULL, // Don't think this is needed because we can just check against finalLawyerId (-1 if case not task, and some other number if case if taken)
//urgencyScore INT(11) NOT NULL, // Don't think we need this at the table since we are calculating within the match function 

"CREATE TABLE rejections (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    beneficiaryId INT(11) NOT NULL,
    lawyerId INT(11) NOT NULL,
    CONSTRAINT beneficiaries_FK1 FOREIGN KEY (beneficiaryId) REFERENCES users(userId),
    CONSTRAINT lawyers_FK1 FOREIGN KEY (lawyerId) REFERENCES users(userId)
)"

// Practice areas table (We will track based on the userid, will be -1 by default and then updated to the lawyers' quotes)
// TODO: Set defualt values
"CREATE TABLE practiceAreas (
    userId INT(11) NOT NULL PRIMARY KEY, 
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
    defamation FLOAT, 
    mcst FLOAT, 
    conveyancing FLOAT, 
    landlord FLOAT, 
    renovation FLOAT,  
    CONSTRAINT pracAreas_FK FOREIGN KEY (userId) REFERENCES users(userId)
)"

//TODO: Also what if laypersons do not know their areas very well and choose wrongly?
// Will be 0 by default and updated to 1 if they need help
"CREATE TABLE helpAreas (
    userId INT(11) NOT NULL PRIMARY KEY, 
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
    defamation INT(11), 
    mcst INT(11), 
    conveyancing INT(11), 
    landlord INT(11), 
    renovation INT(11),  
    CONSTRAINT helpAreas_FK FOREIGN KEY (userId) REFERENCES users(userId)
)"

// For firms
//TODO: What other details do we need to track?
"CREATE TABLE lawFirms (
    firmId INT(11) AUTO_INCREMENT PRIMARY KEY,
    firmName VARCHAR(256) NOT NULL,
    officialEmail VARCHAR(256) NOT NULL
)"

// For legal clinics
"CREATE TABLE legalClinics (
    clinicId INT(11) AUTO_INCREMENT PRIMARY KEY,
    clinicName VARCHAR(256) NOT NULL,
    officialEmail VARCHAR(256) NOT NULL
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