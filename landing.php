<!DOCTYPE html>
<html>
    <head>
        <title>Landing</title>
         <!--For normal montserrat-->
         <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
        <style>
            body{
                overflow-x: hidden;
            }
            #head{
                position: absolute;
                width: 1903px;
                height: 842px;
                left: -1px;
                top: -2px;
            }
            #headtext{
                position: absolute;
                width: 1703px;
                height: 400px;
                left: 0px;
                top: 0px;
                background: url(includes/shakehand.png);
                z-index: 1;
            }
            .brandname{
                font-family: 'Montserrat', sans-serif;
                color: black;
                position: absolute;
                z-index: 5;
                left: 100px;
            }
            .one{ /*What would you like to do*/
                position: absolute;
                width: 810px;
                height: 99px;
                left: 580px;
                top: 450px;
                z-index: 2;
                font-family: 'Montserrat', sans-serif;
            }
            .two{ /*About us*/
                position: absolute;
                width: 310px;
                height: 92px;
                left: 690px;
                top: 1000px;
                z-index: 3;
                font-family: 'Montserrat', sans-serif;
                color: white;
                cursor:pointer;
            }
            .five{
                position: absolute;
                width: 253.93px;
                height: 63.31px;
                left: 543.55px;
                top: 1785.03px;
                z-index: 2;
                font-family: 'Montserrat', sans-serif;
            }
            #circle1{
                position: absolute;
                width: 200px;
                border-radius: 50%;
                border-width: 10px;
                border-color: #58A4B0;
                height: 200px;
                left: 330px;
                top: 570px;
                z-index: 2;
                background-color: #81BAC4;
                cursor:pointer;
            }
            #circle2{
                position: absolute;
                width: 200px;
                border-radius: 50%;
                border-width: 10px;
                border-color: #58A4B0;
                height: 200px;
                left: 648px;
                top: 570px;
                z-index: 2;
                background-color: #81BAC4;
                cursor:pointer;
            }
            #circle3{
                position: absolute;
                width: 200px;
                border-radius: 50%;
                border-width: 10px;
                border-color: #58A4B0;
                height: 200px;
                left: 966px;
                top: 570px;
                z-index: 2;
                background-color: #81BAC4;
                cursor:pointer;
            }
            #circle1:hover, #circle2:hover, #circle3:hover{
                background: #58A4B0;
                transition-delay: 1s;
            }
            .regIndiv{
                position: absolute;
                width: 246px;
                height: 26px;
                left: 345px;
                top: 620px;
                font-family: 'Montserrat', sans-serif;
                z-index: 2;
            }
            .regFirm{
                position: absolute;
                width: 150px;
                height: 26px;
                left: 685px;
                top: 615px;
                font-family: 'Montserrat', sans-serif;
                z-index: 2;
            }
            .login{
                position: absolute;
                width: 150px;
                height: 26px;
                left: 996px;
                top: 615px;
                font-family: 'Montserrat', sans-serif;
                z-index: 2;
            }
            
            #overview{
                position: absolute;
                width: 208px;
                height: 46px;
                left: 650px;
                top: 850px;
                z-index: 2;
                background-color: #58A4B0;
                border-radius: 5px;
                border-color: grey;
                border-width: 2px;
                font-family: 'Montserrat', sans-serif;
                font-weight: bold;
            }
            #overview:hover{
                background-color: #81BAC4;
            }
            #middle{
                position: absolute;
                width: 1903px;
                height: 500px;
                left: 0px;
                top: 1000px;
                background: #2D0320;
                z-index: 1;
            }
            #centretop{
                position: absolute;
                width: 900px;
                height: 400px;
                left: 302px;
                top: 1100px;
                background: #FFFFFF;
                border-radius: 50px 50px 0px 0px;
                z-index: 2;
            }
            #centretopPic{
                position: absolute;
                width: 450px;
                height: 400px;
                left: 302px;
                top: 1100px;
                background: url(includes/twosign.jpg);
                border-radius: 50px 0px 0px 0px;
                z-index: 3;
            }
            #centretext{
                position: absolute;
                width: 381px;
                height: 370px;
                left: 790px;
                top: 1200px;
                z-index: 5;
                font-family: 'Montserrat', sans-serif;
            }
            #mission{
                position: absolute;
                width: 208px;
                height: 46px;
                left: 800px;
                top: 1430px;
                color: white;
                background-color: #2D0320;
                z-index: 5;
                border-radius: 5px;
                font-family: 'Montserrat', sans-serif;
                border-color: grey;
                border-width: 2px;
            }
            #centrebottom{
                position: absolute;
                width: 1200px;
                height: 648px;
                left: 352px;
                top: 2520px;
                background: #2D0320;
                border-radius: 0px 0px 50px 50px;
                z-index: 3;
            }
            #inputfields{
                position: absolute;
                width: 374px;
                height: 266px;
                left: 492px;
                top: 2762px;
                z-index: 5;
            }
            #name{}
            #email{}
            #query{}
        </style>
    </head>

    <body style="background-color=white;">

    <script>
        function indivRegister(){ //for circle 1
            document.getElementById("circle1").style.backgroundColor = "#58A4B0";
            document.getElementById("circle1").style.transitionDelay = "1s";
            window.location.href = "./registerNeedy.php";
        }
        function lawyerRegister(){ //for circle 2
            document.getElementById("circle1").style.backgroundColor = "#58A4B0";
            document.getElementById("circle1").style.transitionDelay = "1s";
            window.location.href = "./registerLawyer.php";
        }
        function login(){ //for circle 3
            document.getElementById("circle1").style.backgroundColor = "#58A4B0";
            document.getElementById("circle1").style.transitionDelay = "1s";
            window.location.href = "./login.php";
        }
    </script>

        <div id="head"></div>
        <div id="headtext"></div>
        <h3 class="brandname">LegalMatch</h3>
        <div id="white1">
            <h2 class="one">What would you like to do?</h2>
            <div id="circle1" onclick="indivRegister();"></div>
            <div id="circle2" onclick="lawyerRegister();"></div>
            <div id="circle3" onclick="login();"></div>
            <h3 class="regIndiv">Registeration for individuals seeking lawyers</h3>
            <h3 class="regFirm">Registeration for firms' lawyers</h3>
            <h3 class="login">Login for both individuals and lawyers</h3>
            <button id="overview">More about us</button>
        </div>
        <div id="middle"></div>
        <h2 class="two">About Us</h2>
        <div id="centretop"></div>
        <div id="centretopPic"></div>
        <div id="centretext">
             <!--To be changed-->
            <h3 class="three">Company name</h3>
            <h4 class="four">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h4>
        </div>
        <button id="mission">Mission and Vision</button>
        <!-- <div id="centrebottom"></div>
        <h2 class="five">Contact Us</h2>
        <div id="inputfields">
            <input type="text" name="name" id="name" placeholder="Name">
            <input type="text" name="email" id="email" placeholder="Email">
            <input type="text" name="query" id="query" placeholder="Type here..."> -->
        </div>
    </body>
</html>