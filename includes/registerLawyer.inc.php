<!-- BULK INSERT Sales.Orders
FROM '\\SystemX\DiskZ\Sales\data\orders.csv'
WITH ( FORMAT='CSV'); -->
<!-- 
insert into registration values
(38214, 'ISM 4212', 'I-2001'),
(54907, 'ISM 4212', 'I-2001'),
(54907, 'ISM 4930', 'I-2001'),
(54907, 'ISM 3112', 'I-2001'),
(54907, 'ISM 3113', 'I-2001'),
(66324, 'ISM 3113', 'I-2002'),
(66324, 'ISM 3112', 'I-2001'),
(70542, 'ISM 3112', 'I-2001'),
(70542, 'ISM 4212', 'I-2002'); -->
<?php
    include "dbh.inc.php";

    // if (isset($_POST['submit'])) {
    //     if (($open = fopen("registration.csv", "r")) !== FALSE) {
    //         while (($data = fgetcsv($Open, 1000, ",")) !== FALSE) {
    //             $array[] = $data;    
    //             $userName = $array[0];
    //             $userEmail = $array[1];
    //             $pwd = $array[2];
    //             $query = "INSERT INTO users (userName, userEmail, pwd) VALUES ('$userName', '$userEmail', '$pwd')";
    //             mysqli_query($conn, $query);
    //         }
    //     }
    //     heading("location: ../landing.php");
    // }
    echo "List of lawyers updated! Please go back to the main page for lawyers to log in."
 
?>