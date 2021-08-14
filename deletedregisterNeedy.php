<!DOCTYPE html>
<html>
    <head>
        <title>Registration for firms</title>
        <!--For normal montserrat-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
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
                margin-left: 120px;
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
        </style>
    </head>

    <body style="background-color=white;">
        <div id="triangleright1"></div>
        <div id = "triangleright2"></div>
        <form action="includes/registerNeedy.inc.php" method="POST">
        <h1 class="fillblank">Individual Registration</h1>
            <div id="container">
                <input type="text" name="email" id="email" placeholder="Email">
                <input type="password" name="pwd" id="pwd" placeholder="Password"> 
                <h2 class="title">Register for an account</h2>
                <button type="submit" name="login" id="registerbtn">Register yourself now</button>
            </div>
        </form>
    </body>
</html>