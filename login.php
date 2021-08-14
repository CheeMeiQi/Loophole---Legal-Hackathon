<?php
    include_once 'footer.php'
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <!--For normal montserrat-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
        <style>
            /*style stuff*/ 
            /*Use this for semi-bolded font --> font-family: 'Montserrat', sans-serif;*/ 
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
            #email{
                font-family: 'Montserrat', sans-serif;
                font-size: 18px;
                color: black;
                background-color: #81BAC4;
                border-style: solid;
                border-color: white;
                border-width: 2px;
                border-radius:5px;
                width: 400px;
                height: 50px;
            }
            #pwd{
                font-family: 'Montserrat', sans-serif;
                font-size: 18px;
                color: black;
                background-color: #81BAC4;
                border-style: solid;
                border-color: white;
                border-width: 2px;
                border-radius: 5px;
                width: 400px;
                height: 50px;
                margin-top: 10px;
            }
            #loginbtn{
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
            #email:hover, #pwd:hover, #loginbtn:hover {
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
        <form action="includes/login.inc.php" method="POST">
        <h1 class="fillblank">Login to access your account</h1>
            <div id="container">
                <h2 class="title">Login</h2>
                <input type="text" name="uid" id="email" placeholder="Username/Email">
                <input type="password" name="pwd" id="pwd" placeholder="Password"> 
                <a href="forgetpwd.php" style="font-family: 'Montserrat', sans-serif; font-size: 15px;">Forget password?</a>
                <button type="submit" name="login" id="loginbtn">Login</button>
                <h4 class="question">Do not have login details? Contact your admin to register.</h4>
            </div>
            </form>
            <!-- Error handling -->
		<?php
			if (isset($_GET["error"])) {
				if ($_GET["error"] == "emptyinput") {
					echo "<p>Fill in all fields!</p>";
				}
				else if ($_GET["error"] == "wronglogin") {
					echo "<p>Incorrect login info!</p>";
				}
			}
		?>
    
    </body>
 
</html>