<?php

include "dbh.inc.php";

if (isset($_POST['checkbtn'])) {
    $firmName = $_POST['firmName'];
    $officialEmail = $_POST['email'];

    $verification = "SELECT * FROM registeredlawfirms WHERE firmName = $firmName AND officialEmail = $officialEmail;";
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

                    $register = "INSERT INTO registeredlawfirms(firmName, officialEmail) VALUE ($firmName, $officialEmail);";

                    mysqli_query($conn, $register);
                }
            } else {
                echo 'console.log("Sorry, we are currently unable to verify you as a registered legal clinic in Singapore. Kindly email us at _____ to to register your legal clinic with us. Thank you.");';
            }
        }
        echo "Registrations for lawyers done! Get them to sign up with your default password. Click the back button to go back to the landing page.";
        header("location: ../registerLawyer.php");
}

?>