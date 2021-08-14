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
    <link rel="stylesheet" href="clientsStyle.css" />
    <link
      href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"
      rel="stylesheet"
    />
    <title>Profile name</title>
  </head>

  <body>
    <script>
      function lawyerProfile(){ //for "Back to Profile"
        document.getElementById("button").style.backgroundColor = "#58A4B0";
        document.getElementById("button").style.transitiondelay = "1s";
        window.location.href = "./lawyerB.php";
      }
    </script>

    <div id="titleStyle">
      <h1>Hello [insert profile name]!</h1>
      <p>
        This is where you manage your current and pending clients.
      </p>
        <button id="button" onclick="lawyerProfile()">Back to Profile</button>
    </div>

    <div id="account">
      <h2 style="text-align: center">My Clients</h2>
      
        <form>
          
            <div id="inlineStyle">
              <div id="current">
                <h4>Current Clients</h4>
              </div>
              <div id="pending">
                <h4>Pending Clients</h4>
              </div>
            </div>
      
        </form>

    
  </body>
</html>
