<?php
    session_start();
    $user = 'root'; 
    $pass = '';
    $db='loophole';
    $conn = mysqli_connect('localhost', $user, $pass, $db);
    $userId = $_SESSION["userId"];
    date_default_timezone_set("Singapore");
?>
<!DOCTYPE html>
<html>
<?php
    $userName = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $firm = $_POST["CoName"];
    $workNum = $_POST["workNo"];
    $workEmail = $_POST["workEmail"];
    $profilePic = null;
    $remainingCases = $_POST["avail"];
    $areasArr = $_POST["pracArea"];

    //function setLawyerProfile() {
    //TODO: possible for profilepic and workNum to be null
    //TODO: need to figure out how exactly we will be uploading profile pic into mysql
    //TODO: $areasArr will be a array that has 34 spaces with -1. The slot will be updated with the actual 'quote' when the lawyer selects it

    $lawyerInsert = "INSERT INTO lawyers(userId, firstName, lastName, gender, firm, workNum, workEmail, profilePic, remainingCases) VALUES ($userId, $firstName, $lastName, $gender, $workNum, $workEmail, $profilePic, $remainingCases);";

    $pracAreasInsert = "INSERT INTO practiceAreas(userId, crimDefence, commCrime, magComplaint, cyberCrime, harassment, divorce, syariahDivorce, divorceInEng, preNuptial, personalProt, adoption, lpa, probate, wills, muslimWills, mentalCap, trusts, deedPolls, notary, iou, bankruptcy, commissioner, powAttorney, debtRecovery, emplyDisputes, medNeglce, civilLit, copyright, personalInjury, defamation, mcst, conveyancing, landlord, renovation) VALUES ($userId, $areasArr[0], $areasArr[1], $areasArr[2], $areasArr[3], $areasArr[4], $areasArr[5], $areasArr[6], $areasArr[7], $areasArr[8], $areasArr[9], $areasArr[10], $areasArr[11], $areasArr[12], $areasArr[13], $areasArr[14], $areasArr[15], $areasArr[16], $areasArr[17], $areasArr[18], $areasArr[19], $areasArr[20], $areasArr[21], $areasArr[22], $areasArr[23], $areasArr[24], $areasArr[25], $areasArr[26], $areasArr[27], $areasArr[28], $areasArr[29], $areasArr[30], $areasArr[31], $areasArr[32], $areasArr[33]);";

    mysqli_query($conn, $lawyerInsert);
    mysqli_query($conn, $pracAreasInsert);
    //}
?>
</html>