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
    <link rel="stylesheet" href="adminStyle.css" />
    <link
      href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"
      rel="stylesheet"
    />
    <title>Profile name</title>
  </head>

  <body>
    <div id="titleStyle">
      <h1>Hello [insert profile name]!</h1>
      <p>
        This is your profile page. You can see the progress you've made with
        your work and manage your clients using this dashboard.
      </p>
      <div id="inlineStyle2">
        <button id="button">Change Password</button>
        <button id="button">Edit Profile</button>
      </div>
    </div>

    <div id="account">
      <h2 style="text-align: center">My Account</h2>
      <div>
        <form>
          <div id="marginStyle">
            <h4>User Information</h4>
            <div id="userInfo">
              <label for="username">Username</label>
              <div>
                <input
                  type="text"
                  id="username"
                  name="username"
                  placeholder="bing123"
                />
              </div>

              <label for="firstName">First name</label>
              <div>
                <input
                  type="text"
                  id="firstName"
                  name="firstName"
                  placeholder="Bing"
                />
              </div>

              <label for="lastName">Last name</label>
              <div>
                <input
                  type="text"
                  id="lastName"
                  name="lastName"
                  placeholder="Bing"
                />
              </div>

              <label for="gender">Gender</label><br />
              <input type="checkbox" id="gender" name="male" />
              <label for="male"> Male</label>
              <input type="checkbox" id="gender" name="female" />
              <label for="female"> Female</label>
              <input type="checkbox" id="gender" name="others" />
              <label for="others"> Others</label>
            </div>

            <h4>Contact Information</h4>
            <div id="contactInfo">
              <label for="CoName">Company Name</label>
              <div>
                <input
                  type="text"
                  id="CoName"
                  name="CoName"
                  placeholder="Enter company name"
                />
              </div>

              <label for="personalNo">Personal Number</label>
              <div>
                <input
                  type="tel"
                  id="personalNo"
                  name="personalNo"
                  placeholder="Exclude country code"
                />
              </div>

              <label for="personalEmail">Personal Email</label>
              <div>
                <input
                  type="email"
                  id="personalEmail"
                  name="personalEmail"
                  placeholder="bing@example.com"
                />
              </div>
            </div>

            <h4>Upload Employee Details</h4>
            <h5 style="margin-left: 3%">Download Template .csv here</h5>
            <!-- insert template -->
            <button id="download-csv" style="margin-left: 3%">Download CSV File</button>
            <!-- https://www.javatpoint.com/javascript-create-and-download-csv-file -->
            <h4>Upload employee details here</h4>
            <!-- Choose file -->
            <form action="/action_page.php">
                <input type="file" id="myFile" name="filename" style="margin-left: 3%">
            </form>
        </div>
        </form>

    <input type="submit" value="Submit" id="submit" />
  </body>
</html>
