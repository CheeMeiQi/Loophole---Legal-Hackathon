<?php 
    include 'file-upload-download/filesLogic.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration for firms</title>
        <!--For normal montserrat-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
             .title{
                color: white;
                font-family: 'Montserrat', sans-serif;
            }
            #triangleright1{
                position: absolute;
                width: 2000.33px;
                height: 1000.91px;
                left: 400.19px;
                top: -100.85px;
                background: #58A4B0;
                border-radius: 20px;
                transform: rotate(18.78deg);
            }
            #triangleright2{
                position: absolute;
                width: 2000.33px;
                height: 1200.91px;
                left: 600.74px;
                top: -300.14px;
                background: #81BAC4;
                border-radius: 20px;
                transform: rotate(18.78deg);
            }
            #fileSelect{
                font-family: 'Montserrat', sans-serif;
                border-radius: 5px;
                border-color: black;
                border-width: 2px;
            }
            #registerbtn{
                font-family: 'Montserrat', sans-serif;
                font-size: 18px;
                font-weight: 10px;
                color: black;
                background-color: #81BAC4;
                border-style: solid;
                border-color: white;
                border-width: 2px;
                border-radius: 5px;
                width: 150px;
                height: 50px;
                margin-top: 10px;
                margin-left: 80px;
            }
            #registerbtn:hover {
                background-color: #abf2ff;
            }
            .question{
                font-family: 'Montserrat', sans-serif;
            }
            #container{
                position: absolute;
                z-index: 2;
                display: block;
                width: 420px;
                align-items: center;
                margin-left: 900px;
                margin-top: 20px;
            }
            .fillblank{
                font-family: 'Montserrat', sans-serif;
                width: 200px;
                margin-left: 80px;
                margin-top: 50px;
            }
            #back{
                font-family: 'Montserrat', sans-serif;
                background-color: #abf2ff;
                margin-top: 680px;
                left: 100px;
                position: absolute;
                border-width: 2px;
                border-radius: 5px;
                border-color: black;
                font-weight: bold;
            }
        </style>
    </head>

    <body style="background-color=white;">
    <script>
        function checkFile() {
            if (document.getElementById("fileSelect").value == "") {
                window.alert("Please submit an acceptable file type in the file upload field following the instructions below!");
                window.location.href="../registerLawyer.php"
            }
        }
        function main(){
            window.location.href="../landing.php"
        }
    </script>
        <div id="triangleright1"></div>
        <div id = "triangleright2"></div>

        <h1 class="fillblank">Firm Registration for Lawyers</h1>
            <div id="container">
                <h2 class="title">Register for your lawyers</h2>
                <form action="registerLawyer.php" method="POST" enctype="multipart/form-data">
                <input id="fileSelect" type="file" name="myfile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                    <button type="submit" name="save" id="registerbtn" onclick="checkFile();">Register lawyers now</button>
                </form>
                <h4 class="question">Please insert a .csv file with the following format, which can be downloaded from the download button below.</h4>
                <a href="LIThack.csv" download="registration.csv">
                    <button class="btn" style="background-color=white;border-radius=5px;border-width=2px;width:50px;height:30px;"><i class="fa fa-download fa-2x" aria-hidden="true"></i></button>
                </a>
            </div>
        <button type="button" id="back" onclick="main();">Back to main page</button>
    </body>
</html>