<?php
    session_start();
    $user = 'root'; 
    $pass = '';
    $db='loophole';
    $conn = mysqli_connect('localhost', $user, $pass, $db);
    $userId = $_SESSION["userId"];
    date_default_timezone_set("Singapore");

    //include "../Loophole---Legal-Hackathon/includes/match1.inc.php";
?>
<!DOCTYPE html>
<html>
<?php
    $userName = $_POST["jsUsername"];
    $firstName = $_POST["jsFirstName"];
    $lastName = $_POST["jsLastName"];
    $age = $_POST["jsAge"]; 
    $gender = $_POST["jsGender"];
    $firm = $_POST["jsCoName"];
    $phoneNum = $_POST["jsPersonalkNo"];
    $email = $_POST["jsPersonalEmail"];
    $profilePic = null;
    $waitPeriod = (int) $_POST["jsWait"];
    $court = $_POST["jsCourt"]; 
    $abuse = $_POST["jsAbuse"]; 
    $areasArr = json_decode($_POST["jsHelpArea"]);

    

    $bInsert = "INSERT INTO beneficiaries(userId, firstName, lastName, age, gender, brief, phoneNum, email, waitPeriod, court, abuse, budget, firstReqDate, latestReqExpiry, reqLawyerId, finalLawyerId, caseDoneReqExpiry, caseDoneConfirm) VALUES (-5, '$firstName', '$lastName', $age, '$gender', '$brief', $phoneNum, '$email', $waitPeriod, $court, $abuse, $budget, null, null, -1, -1, null, 0);";

        $helpAreasInsert = "INSERT INTO helpAreas(userId, crimDefence, commCrime, magComplaint, cyberCrime, harassment, divorce, syariahDivorce, divorceInEng, preNuptial, personalProt, adoption, lpa, probate, wills, muslimWills, mentalCap, trusts, deedPolls, notary, iou, bankruptcy, commissioner, powAttorney, debtRecovery, emplyDisputes, medNeglce, civilLit, copyright, personalInjury, defamation, mcst, conveyancing, landlord, renovation) VALUES (-5, $areasArr[0], $areasArr[1], $areasArr[2], $areasArr[3], $areasArr[4], $areasArr[5], $areasArr[6], $areasArr[7], $areasArr[8], $areasArr[9], $areasArr[10], $areasArr[11], $areasArr[12], $areasArr[13], $areasArr[14], $areasArr[15], $areasArr[16], $areasArr[17], $areasArr[18], $areasArr[19], $areasArr[20], $areasArr[21], $areasArr[22], $areasArr[23], $areasArr[24], $areasArr[25], $areasArr[26], $areasArr[27], $areasArr[28], $areasArr[29], $areasArr[30], $areasArr[31], $areasArr[32], $areasArr[33]);";

    

    mysqli_query($conn, $bInsert);
    mysqli_query($conn, $helpAreasInsert);

    header("location: ../includes/match2.inc.php");
    //echo ("I successfully updated the database!");
    //}
?>
</html>