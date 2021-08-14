<?php

if (isset($_POST["login"])) {

    $email = $_POST["uid"];
    $pwd = $_POST["pwd"]; 

    require_once "dbh.inc.php";
    require_once "functionsfirm.inc.php";

    //Error handling
    if (emptyInputLogin($email, $pwd) !== false) {
        header("location: ../loginfirm.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $pwd);
}
else {
    header("location: ../lawyerB.php");
    exit();
}

?>