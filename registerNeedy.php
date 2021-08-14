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
                margin-top: 500px;
            }
            #username{
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
                margin-top: 10px;
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
            #cfm_pwd{
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
            #email:hover, #pwd:hover, #cfm_pwd:hover{
                background-color: #abf2ff;
            }
        </style>
    </head>

    <body style="background-color=white;">
    <script>
        function main() {
            window.location.href="landing.php";
        }
    </script>

        <div id="triangleright1"></div>
        <div id = "triangleright2"></div>
        <form action="includes/registerNeedy.inc.php" method="POST">
        <h1 class="fillblank">Individual Registration</h1>
            <div id="container">
                <h2 class="title">Register for an account</h2>
                <input type="username" name="username" id="username" placeholder="Username">
                <input type="text" name="email" id="email" placeholder="Email">
                <input type="password" name="pwd" id="pwd" placeholder="Password">    
                <input type="password" name="cfm_pwd" id="cfm_pwd" placeholder="Re-type password">       
                <button type="submit" name="login" id="registerbtn">Register yourself now</button>
            </div>
        </form>
        <button type="button" id="back" onclick="main();">Back to main page</button>
    </body>
   
    <!-- Error handling -->
		<?php
			if (isset($_GET["error"])) {
				if ($_GET["error"] == "emptyinput") {
					echo "<p>Fill in all fields!</p>";		
				}
				else if ($_GET["error"] == "invaliduid") {
					echo "<p>Fill in all fields!</p>";
				}
				else if ($_GET["error"] == "invalidemail") {
					echo "<p>Fill in a valid email address!</p>";
				}
				else if ($_GET["error"] == "passwordsdontmatch") {
					echo "<p>Passwords don't match!</p>";
				}
				else if ($_GET["error"] == "stmtfailed") {
					echo "<p>Something went wrong, try again!</p>";
				}
				else if ($_GET["error"] == "usernametaken") {
					echo "<p>Username already taken!</p>";
				}
			}
		?>
</html>