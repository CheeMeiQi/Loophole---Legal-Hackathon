<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" href="overviewStyle.css" />
    <link
      href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"
      rel="stylesheet"
    />
    <title>Legal Match</title>
  </head>

  <body>
    <!-- linking pages -->
    <script>
      function indivRegister(){
        document.getElementById("button").style.backgroundColor = "#58A4B0";
        document.getElementById("button").style.transitionDelay = "1s";
        window.location.href = "./registerNeedy.php"
      }
    </script>

    <div id="titleStyle">
      <h1 style="font-size: 50px; margin-left: 3%">Legal Match</h1>
    </div>

    <div id="problemStyle">
      <h2>Having difficulty finding a lawyer?</h2>
      <p>
        Our platform is perfect for finding a lawyer:
      </p>
      <ul>
        <li>Who matchees your budget</li>
        <li>As soon as possible</li>
        <li>With the right expertise to assist with your case</li>
    </ul>
    </div>

    <div>
      <img id="imageStyle" src="image1.jpg" alt="writing contract">
    </div>

    <div id="bottomSection">
      <div id="greyBox">
        <div id="solutionStyle">
          <h2 >Our Solution: A single database of lawyers and beneficiaries</h2>
        </div>

        <div id="iconStyle">
          <i class="fas fa-wrench" ></i>
          <i class="fas fa-wrench"></i>
          <i class="fas fa-wrench"></i>
        </div>
      </div>

      <div id="solutionColumns">
        <div id="col1">
          <h3 style="text-align: center; color: #50B2EA;">Step 1: Register</h3>
          <p>Register for access to our database, either as an individual or through a legal clinic.</p>
        </div>

        <div id="col2">
        <h3 style="text-align: center; color: #50B2EA;">Step 2: Questions</h3>
          <p>Answer a few simple questions to provide details about your case.</p>
        </div>

        <div id="col3">
        <h3 style="text-align: center; color: #50B2EA;">Step 3: Match!</h3>
          <p>Get matched with the most suitable lawyer for your case!</p>
        </div>
      </div>

      <div id="teamStyle">
        <h2 style="text-align: center; color: white;">Our Team</h2>
        <div id="first3">
          <div id="bing">
            <div id="bingpic"></div>
            <h3>Lim Bing</h3>
            <p>Backend developer - Lim Bing is a passionate individual currently a student at SMU, majoring in Business and Computer Science. She has played a crucial role in both the frontend and backend development by designing the webpages and implementing a database. </p>
          </div>

          <div id="sniggy">
          <div id="sniggypic"></div>
            <h3>Snigdha Swaninathan</h3>
            <p>Law Student - Snigdha is currently studying Law in NUS. She has helped us to know more about the law industry and how technology will change the legal industry.</p>
          </div>

          <div id="preshi">
          <div id="preshipic"></div>
            <h3>Pandi Preshita</h3>
            <p>Backend developer - Preshita is currently majoring in Computer Science at NUS. She is instrumental in writing the algorithm of our solution and implementing a database. </p>
          </div>
        </div>

        <div id="last2">
          <div id="sy">
          <div id="sypic"></div>
            <h3>Lim Shyun Yin</h3>
            <p>Frontend developer - Shyun Yin is currently a  student at NUS, majoring in Computer Engineering. She plays an essental role in integrating the frontend and backend.</p>
          </div>

          <div id="mq">
          <div id="mqpic"></div>
            <h3>Chee Mei Qi</h3>
            <p>Frontend developer - Mei Qi is currently studying Computer Science in NTU, with a second major in business. She has helped enormously in creating and designing the webpages.</p>
          </div>
        </div>
      </div>

      <div id="lastSection">
        <h1 style="text-align:center;">Find a lawyer today!</h1>
        <div id="buttonWrapper">
          <button id="button" onclick="indivRegister()">
            <i
              class="fas fa-gavel"
              style="font-size: 15px; vertical-align: center"
            ></i>
            Register Here Individually
          </button>
        </div>
      </div>
    </div>

  </body>
</html>
