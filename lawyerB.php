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
    <link rel="stylesheet" href="lawyerBstyle.css" />
    <link
      href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"
      rel="stylesheet"
    />
    <title>Profile name</title>
  </head>

  <body>
    <div id="titleStyle">
      <h1>Hello [insert profile name]!</h1>
      <h2>Company: [insert company name]</h2>
      <p>
        This is your profile page. You can see the progress you've made with
        your work and manage your clients using this dashboard.
      </p>
      <button id="editButton">Edit Profile</button>
    </div>

    <div id="account">
      <h2 style="text-align: center">My Account</h2>
      <div>
        <!-- for is to pair with input id -->
        <!-- name is for javascript -->
        <!-- textarea is for a block of text -->
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

              <label for="workNo">Work Number</label>
              <div>
                <input
                  type="tel"
                  id="workNo"
                  name="workNo"
                  placeholder="Exclude country code"
                />
              </div>

              <label for="workEmail">Work Email</label>
              <div>
                <input
                  type="email"
                  id="workEmail"
                  name="workEmail"
                  placeholder="bing@example.com"
                />
              </div>
            </div>

            <h4>Availability</h4>
            <div id="availability">
              <label for="avail">Maximum number of cases you can take on:</label
              ><br />
              <select name="avail" id="avail">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
          </div>

          <div id="PASandFee">
            <div id="PAS">
              <div id="inlineStyle">
                <h4>Practice Areas and Specialities</h4>
                <br />
                <h4>Minimum Legal Fee</h4>
                <br />
              </div>

              <!-- //////////////////////////// -->
              <div id="inlineStyle">
                <label for="practiceArea" style="margin-right: 25%"
                  >Select ALL practice areas and specialities you can take
                  on:</label
                ><br /><br />
                <label for="legalFee"
                  >State the minimum legal fee you are willing to accept:</label
                ><br /><br />
              </div>
              <!-- //////////////// -->

              <div id="inlineStyle">
                <input type="checkbox" id="practiceArea" name="Crime Defence" />
                <label for="Crime Defence"> Crime Defence</label><br /><br />
                <hr />
                <input
                  type="text"
                  id="fee"
                  name="fee"
                  placeholder="$ Round off to nearest whole number"
                  size="30"
                />
              </div>
              <hr />

              <!-- //////////////////// -->
              <div id="inlineStyle">
                <input type="checkbox" id="practiceArea" name="Divorce" />
                <label for="Divorce"> Divorce</label><br /><br />
                <hr />
                <input
                  type="text"
                  id="fee"
                  name="fee"
                  placeholder="$ Round off to nearest whole number"
                  size="30"
                />
              </div>
              <hr />

              <!-- /////////////////////// -->
              <div id="inlineStyle">
                <input type="checkbox" id="practiceArea" name="Bankruptcy" />
                <label for="Bankruptcy"> Bankruptcy</label><br /><br />
                <hr />
                <input
                  type="text"
                  id="fee"
                  name="fee"
                  placeholder="$ Round off to nearest whole number"
                  size="30"
                />
              </div>
              <hr />

              <!-- /////////////////////// -->
              <div id="inlineStyle">
                <input type="checkbox" id="practiceArea" name="Harassment" />
                <label for="Harassment"> Harassment</label><br /><br />
                <hr />
                <input
                  type="text"
                  id="fee"
                  name="fee"
                  placeholder="$ Round off to nearest whole number"
                  size="30"
                />
              </div>
              <hr />
            </div>
          </div>
        </form>
      </div>
    </div>
    <input type="submit" value="Submit" id="submit" />
  </body>
</html>
