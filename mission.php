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
    <link rel="stylesheet" href="missionStyle.css" />
    <link
      href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"
      rel="stylesheet"
    />
    <title>Legal Match</title>
  </head>

  <body>
    <!-- linking pages -->
    <script>
      function overview() {
        //for "I Need Assistance"
        document.getElementById("button1").style.backgroundColor = "#58A4B0";
        document.getElementById("button1").style.transitionDelay = "1s";
        window.location.href = "./overview.php";
      }
      function landing() {
        //for "Reach out to us today"
        document.getElementById("button2").style.backgroundColor = "#58A4B0";
        document.getElementById("button2").style.transitionDelay = "1s";
        window.location.href = "./landing.php";
      }
    </script>

    <div id="titleStyle">
      <h1 style="font-size: 50px; margin-left: 3%">Legal Match</h1>
    </div>

    <div id="container1">
      <h2>In need of legal assistance?</h2>
      <p>
        Simply click below to find out how you can set up a profile to access
        our database today!
      </p>
      <br />
      <br />
      <button id="button1" onclick="overview()">I Need Assistance</button>
      <button id="button2" onclick="landing()">Reach out to us today!</button>
    </div>

    <div id="container2">
      <h2 style="text-align: center">What We Do</h2>
      <p>
        We make it easy for those in need of affordable legal assistance to find
        a lawyer through a single database that is efficient and user-friendly.
        Individuals can wave goodbye to the stress of figuring out the process
        to getting a lawyer that is within their means, with the website
        accomodating for all budgets, including individuals who require pro-bono
        lawyers. At the same time, we make it easy for lawyers who wish to help
        by matching them up directly with individuals with the greatest need.
      </p>
    </div>

    <div id="container3">
      <h2 style="text-align: center">Mission</h2>
      <p>
        We want to provide every individual who is in need of legal assistance
        with the best lawyer, at the best price. Navigating the legal system is
        a daunting task for anyone to embark upon alone. Here at Legal Match, we
        also aim to ease one’s journey by addressing challenges that they face,
        like lengthy waiting times and rejection by legal aid schemes. We
        believe that no one should fall through the cracks.
      </p>
    </div>

    <img id="image" src="image3.jpg" alt="businessman reading contract" />

    <div id="image"></div>

    <div id="container4">
      <h2 style="text-align: center">Vision</h2>
      <p>
        Legal Match wants to pave the way for increased access to justice in
        Singapore. We believe that no one should be denied legal assistance
        simply because they lack the means to obtain it, and that the legal
        system should be easier for laypersons to navigate.
      </p>
    </div>

    <div id="benefitStyle">
      <h1>Benefits of Legal Match</h1>
    </div>

    <div id="inline">
      <div id="benefit1">
        <h3>Efficient</h3>
        <p>
          Individuals in need can find a lawyer perfectly suited to their needs
          and budget as fast as possible.
        </p>
      </div>

      <div id="benefit2">
        <h3>Highly Accessible</h3>
        <p>
          Individuals rejected by existing legal aids schemes no longer need to
          fret - our platform ensures featured means testing that is not overly
          stringent.
        </p>
      </div>

      <div id="benefit3">
        <h3>User-friendly</h3>
        <p>
          Users simply need to fill in basic information. Our algorithm does the
          heavy-lifting, all while protecting confidentiality.
        </p>
      </div>

      <div id="benefit4">
        <h3>Refined</h3>
        <p>
          The platform is dynamic and refined, taking into account real-world
          concerns, even identifying more urgent cases that might need more
          immediate attention.
        </p>
      </div>
    </div>

    <div id="contactStyle">
      <h1>Contact Us</h1>

      <button id="button3">
        <i
          class="far fa-envelope"
          style="font-size: 15px; vertical-align: center"
        ></i>
        test@gmail.com
      </button>
      <button id="button4">
        <i
          class="fas fa-phone"
          style="font-size: 15px; vertical-align: center"
        ></i
        >(+65) 6123 4567
      </button>
    </div>
  </body>
</html>
