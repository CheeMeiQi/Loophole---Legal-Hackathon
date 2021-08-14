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
    <link rel="stylesheet" href="needyStyle.css" />
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
        <!-- for is to pair with input id -->
        <!-- name is for javascript -->
        <!-- textarea is for a block of text -->
        <form id="needyProfile" action="../Loophole---Legal-Hackathon/includes/needyProfile.inc.php" method="POST">
        <script>
          var ele = document.getElementById("needyProfile");
        </script>
          <div id="marginStyle">
            <h4>User Information</h4>
            <div id="userInfo">
              <label for="username">Username</label>
              <div>
                <input
                  type="text"
                  id="username"
                  name="username"
                  placeholder="username"
                  oninput="update(this.value, 'username')"
                />
              </div>

              <label for="firstName">First name</label>
              <div>
                <input
                  type="text"
                  id="firstName"
                  name="firstName"
                  placeholder="First Name"
                  oninput="update(this.value, 'firstName')"
                />
              </div>

              <label for="lastName">Last name</label>
              <div>
                <input
                  type="text"
                  id="lastName"
                  name="lastName"
                  placeholder="Last Name"
                  oninput="update(this.value, 'lastName')"
                />
              </div>

              <label for="age">Age</label>
              <div>
                <input
                  type="text"
                  id="age"
                  name="age"
                  placeholder="Age"
                  oninput="update(this.value, 'age')"
                />
              </div>

              <label for="gender">Gender</label><br />
              <input type="radio" id="gender" name="male" oninput="update('m', 'gender')"/>
              <label for="male"> Male</label>
              <input type="radio" id="gender" name="female" oninput="update('f', 'gender')" />
              <label for="female"> Female</label>
              <input type="radio" id="gender" name="others" oninput="update('o', 'gender')" />
              <label for="others"> Others</label>
            </div>

            <h4>Contact Information</h4>
            <!-- <div id="contactInfo">
              <label for="CoName">Company Name</label>
              <div>
                <input
                  type="text"
                  id="CoName"
                  name="CoName"
                  placeholder="Enter company name"
                  oninput="update(this.value, 'CoName')"
                />
              </div> -->

              <label for="personalNo">Personal Number</label>
              <div>
                <input
                  type="tel"
                  id="personalNo"
                  name="personalNo"
                  placeholder="Exclude country code"
                  oninput="update(this.value, 'personalNo')"
                />
              </div>

              <label for="personalEmail">Personal Email</label>
              <div>
                <input
                  type="email"
                  id="personalEmail"
                  name="personalEmail"
                  placeholder="bing@example.com"
                  oninput="update(this.value, 'personalEmail')"
                />
              </div>
            </div>

            <h4>Brief</h4>
            <div id="brief">
              <label for="brief"
                > Brief statement of your case</label></br>
                <textarea name="brief" id="brief" cols="40" rows="10" oninput="update(this.value, 'brief')"></textarea>
            </div>


            <h4>Wait Period</h4>
            <div id="waitPeriod">
              <label for="wait"
                >Maximum no. of waiting days for lawyer's acceptance of case
                offer</label
              ><br />
              <select name="wait" id="wait" oninput="update(this.value, 'wait')">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>

            <div id="court">
              <label for="court">
                Have court proceedings been commenced in your case? 
              </label><br />

              <input type="radio" id="court" name="court" oninput="update(1, 'court')"/>
              <label for="yes">Yes</label>
              <input type="radio" id="court" name="court" oninput="update(0, 'court')" />
              <label for="no">No</label>
              
              
            </div>

            <div id="abuse">
              <label for="abuse">
              Are you facing any physical/mental abuse?
              </label><br />

              <input type="radio" id="abuse" name="abuse" oninput="update(1, 'abuse')"/>
              <label for="yes">Yes</label>
              <input type="radio" id="abuse" name="abuse" oninput="update(0, 'abuse')" />
              <label for="no">No</label>
              
            </div>

          </div>
          <div id="helpArea&Budget">
            <div id="inlineStyle">
              <div id="helpArea">
                <h4>Areas of Legal Aid needed</h4>
                <label for="helpArea"
                  >Select ALL of your needed legal aid area(s):</label
                ><br />
              <!-- ///////////////// -->
              <script>
                var helpArea = [];
                for (let i=0; i<34; i++){
                  helpArea.push(0);
                }
                function updateHelpArea(index, budget){
                  helpArea[index] = budget;
                  var jsHelpArea = document.createElement("input");
                  jsHelpArea.type = "hidden";
                  jsHelpArea.value = JSON.stringify(helpArea);
                  jsHelpArea.name = "jsHelpArea";
                  ele.appendChild(jsHelpArea);
                }
  
              </script>

            

              <!-- //////////////// -->

              <br />
              <strong>Criminal Law</strong><br/><br/>
                <input type="checkbox" id="helpArea" name="Criminal Defence" />
                <label for="Criminal Defence"> Criminal Defence</label
                ><br /><br />
                <hr />

              <!-- //////////////////// -->
                <input
                  type="checkbox"
                  id="helpArea"
                  name="Commercial Crime and Regulatory Compliance"
                />
                <label for="Commercial Crime and Regulatory Compliance">
                  Commercial Crime and Regulatory Compliance</label
                ><br /><br />
                <hr />

              <!-- /////////////////// -->
              <input
              type="checkbox"
              id="helpArea"
              name="Magistrate's Complaint"
              />
              <label for="Magistrate's Complaint">
              Magistrate's Complaint</label
              ><br /><br />
              <hr />
              
              <!-- /////////////////////// -->
              <input type="checkbox" id="helpArea" name="Cybercrime" />
  <label for="Cybercrime"> Cybercrime</label><br /><br />
  <hr />

<!-- ////////////////////////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Protection From Harassment Order"
  />
  <label for="Protection From Harassment Order">
    Protection From Harassment Order</label
  ><br /><br />
  <hr />

<!-- /////////////////////// -->
<br />
<strong>Family Law</strong><br/><br/>
  <input type="checkbox" id="helpArea" name="Divorce" />
  <label for="Divorce"> Divorce</label><br /><br />
  <hr />

<!-- /////////////////////////////////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Syariah Divorce"
  />
  <label for="Syariah Divorce"> Syariah Divorce</label
  ><br /><br />
  <hr />
<!-- ///////////////////////////////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Divorce in England and Wales"
  />
  <label for="Divorce in England and Wales">
    Divorce in England and Wales</label
  ><br /><br />
  <hr />
<!-- /////////////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Pre-Nuptial Agreement"
  />
  <label for="Pre-Nuptial Agreement"> Pre-Nuptial Agreement</label
  ><br /><br />
  <hr />
<!-- /////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Personal Protection Order"
  />
  <label for="Personal Protection Order">
    Personal Protection Order</label
  ><br /><br />
  <hr />
<!-- /////////////// -->
  <input type="checkbox" id="helpArea" name="Adoption" />
  <label for="Adoption"> Adoption</label><br /><br />
  <hr />

<!-- ////////////// -->
<br />
<strong>Incapacity and Inheritance</strong><br/><br/>
  <input
    type="checkbox"
    id="helpArea"
    name="Lasting Power of Attorney (LPA)"
  />
  <label for="Lasting Power of Attorney (LPA)">
    Lasting Power of Attorney (LPA)</label
  ><br /><br />
  <hr />
<!-- //////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Probate and Letters of Administration"
  />
  <label for="Probate and Letters of Administration">
    Probate and Letters of Administration</label
  ><br /><br />
  <hr />

<!-- //////////////////////////// -->
  <input type="checkbox" id="helpArea" name="Wills" />
  <label for="Wills"> Wills</label><br /><br />
  <hr />

<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Muslim Wills and Inheritance"
  />
  <label for="Muslim Wills and Inheritance">
    Muslim Wills and Inheritance</label
  ><br /><br />
  <hr />

<!-- ////////////////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Mental Capacity Act applications"
  />
  <label for="Mental Capacity Act applications">
    Mental Capacity Act applications</label
  ><br /><br />
  <hr />

<!-- //////// -->
<!-- /////////////////////// -->
  <input type="checkbox" id="helpArea" name="Trusts" />
  <label for="Trusts"> Trusts</label><br /><br />
  <hr />


<!-- /////////////////////// -->
<br />
<strong>Personal Legal Procedures</strong><br/><br/>
  <input
    type="checkbox"
    id="helpArea"
    name="Deed Polls (Name Charge)"
  />
  <label for="Deed Polls (Name Charge)">
    Deed Polls (Name Charge)</label
  ><br /><br />
  <hr />

<!-- ////////////// -->
<!-- /////////////////////// -->
  <input type="checkbox" id="helpArea" name="Notary Public" />
  <label for="Notary Public"> Notary Public</label><br /><br />
  <hr />

<!-- ///////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Drafting IOU/Debt Acknowledgement"
  />
  <label for="Drafting IOU/Debt Acknowledgement">
    Drafting IOU/Debt Acknowledgement</label
  ><br /><br />
  <hr />
<!-- //////////////////// -->
<!-- /////////////////////// -->
  <input type="checkbox" id="helpArea" name="Bankruptcy" />
  <label for="Bankruptcy"> Bankruptcy</label><br /><br />
  <hr />

<!-- ////////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Commissioner for Oaths"
  />
  <label for="Commissioner for Oaths">
    Commissioner for Oaths</label
  ><br /><br />
  <hr />

<!-- ////////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Power of Attorney"
  />
  <label for="Power of Attorney"> Power of Attorney</label
  ><br /><br />
  <hr />

<!-- ////////////////// -->
<!-- /////////////////////// -->
<br />
<strong>Civil Claims</strong><br/><br/>
  <input type="checkbox" id="helpArea" name="Debt Recovery" />
  <label for="Debt Recovery"> Debt Recovery</label><br /><br />
  <hr />

<!-- /////////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Employment Disputes"
  />
  <label for="Employment Disputes"> Employment Disputes</label
  ><br /><br />
  <hr />

<!-- ////////////////////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Medical Negligence"
  />
  <label for="Medical Negligence"> Medical Negligence</label
  ><br /><br />
  <hr />

<!-- //////////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Civil Litigation"
  />
  <label for="Civil Litigation"> Civil Litigation</label
  ><br /><br />
  <hr />

<!-- //////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Copyright Infringement"
  />
  <label for="Copyright Infringement">
    Copyright Infringement</label
  ><br /><br />
  <hr />

<!-- ////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Personal Injury"
  />
  <label for="Personal Injury"> Personal Injury</label
  ><br /><br />
  <hr />

<!-- ////////////////// -->
<!-- /////////////////////// -->
  <input type="checkbox" id="helpArea" name="Defamation" />
  <label for="Defamation"> Defamation</label><br /><br />
  <hr />

<!-- //////////////// -->
<!-- /////////////////////// -->
<br />
<strong>Housing</strong><br/><br/>
  <input type="checkbox" id="helpArea" name="MCST Disputes" />
  <label for="MCST Disputes"> MCST Disputes</label><br /><br />
  <hr />

<!-- ////////////////// -->
<!-- /////////////////////// -->
  <input type="checkbox" id="helpArea" name="Conveyancing" />
  <label for="Conveyancing"> Conveyancing</label><br /><br />
  <hr />

<!-- /////////////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Landlord-Tenant Disputes"
  />
  <label for="Landlord-Tenant Disputes">
    Landlord-Tenant Disputes</label
  ><br /><br />
  <hr />

<!-- ////////////// -->
<!-- /////////////////////// -->
  <input
    type="checkbox"
    id="helpArea"
    name="Renovation Claims"
  />
  <label for="Renovation Claims"> Renovation Claims</label
  ><br /><br />
  <hr />

              </div>
              <!-- ////////// -->

              <div id="budget">
                <h4>Overall Budget</h4>
                <label for="budget"
                  >State the maximum legal fee you can afford in total:</label
                ><br /><br />
                <input
                  type="text"
                  id="fee"
                  name="fee"
                  placeholder="$ Round off to nearest whole number"
                  size="30"
                  oninput="updateHelpArea(0, this.value)" 
                />  
                <!-- is the index 0?  -->
              </div>
            </div>
            <script>
            let username=document.getElementById('username');
            let firstName=document.getElementById('firstName');
            let lastName=document.getElementById('lastName');
            let age=document.getElementById('age');
            let gender;
            let brief=document.getElementById('brief');
            //let CoName=document.getElementById('CoName');
            let personalNo=document.getElementById('personalNo');
            let personalEmail=document.getElementById('personalEmail');
            let wait=document.getElementById('wait');
            let court;
            let abuse;
            
            function update(val, type){
              if (type=='username'){
                username=val;
                var jsUsername = document.createElement("input");
                jsUsername.type = "hidden";
                jsUsername.value = username;
                jsUsername.name = "jsUsername";
                ele.appendChild(jsUsername);
              }
              else if (type=='firstName'){
                firstName=val;
                var jsFirstName = document.createElement("input");
                jsFirstName.type = "hidden";
                jsFirstName.value = firstName;
                jsFirstName.name = "jsFirstName";
                ele.appendChild(jsFirstName);
              }
              else if (type=='lastName'){
                lastName=val;
                var jsLastName = document.createElement("input");
                jsLastName.type = "hidden";
                jsLastName.value = lastName;
                jsLastName.name = "jsLastName";
                ele.appendChild(jsLastName);
              }
              else if (type=='age'){
                age=val;
                var jsAge = document.createElement("input");
                jsAge.type = "hidden";
                jsAge.value = age;
                jsAge.name = "jsAge";
                ele.appendChild(jsAge);
              }
              else if (type=='gender'){
                gender=val;
                var jsGender = document.createElement("input");
                jsGender.type = "hidden";
                jsGender.value = gender;
                jsGender.name = "jsGender";
                ele.appendChild(jsGender);
              }
              else if (type=="brief") {
                brief=val;
                var jsBrief = document.createElement("input");
                jsBrief.type = "hidden";
                jsBrief.value = brief;
                jsBrief.name = "jsBrief";
                ele.appendChild(jsBrief);
              }
              //else if (type=='CoName'){
                // CoName=val;
                // var jsCoName = document.createElement("input");
                // jsCoName.type = "hidden";
                // jsCoName.value = CoName;
                // jsCoName.name = "jsCoName";
                // ele.appendChild(jsCoName);
              //}
              else if (type=='personalNo'){
                personalNo=val;
                var jsPersonalNo = document.createElement("input");
                jsPersonalNo.type = "hidden";
                jsPersonalNo.value = personalNo;
                jsPersonalNo.name = "jsPersonalNo";
                ele.appendChild(jsPersonalNo);
              }
              else if (type=='personalEmail'){
                personalEmail=val;
                var jsPersonalEmail = document.createElement("input");
                jsPersonalEmail.type = "hidden";
                jsPersonalEmail.value = personalEmail;
                jsPersonalEmail.name = "jsPersonalEmail";
                ele.appendChild(jsPersonalEmail);
              }
              else if (type=='wait'){ 
                wait=val;
                var jsWait = document.createElement("input");
                jsWait.type = "hidden";
                jsWait.value = wait;
                jsWait.name = "jsWait";
                ele.appendChild(jsWait);
              }
              else if (type=='court'){
                court=val;
                var jsCourt = document.createElement("input");
                jsCourt.type = "hidden";
                jsCourt.value = court;
                jsCourt.name = "jsCourt";
                ele.appendChild(jsCourt);
              }
              else if (type=='abuse'){ //WHY RED BRACKETS??
                abuse=val;
                var abuse = document.createElement("input");
                abuse.type = "hidden";
                abuse.value = abuse;
                abuse.name = "abuse";
                ele.appendChild(abuse);
              }
            }
          </script>
            <input type="submit" value="Save Profile" id="save"/>
        </form>

    
    
      <!-- include php if needed -->
    
    <form method = "post" action="../includes/match1.inc.php">
        <input type = "submit" name = "refer" value = "Refer me a lawyer">
    </form>
  </body>
</html>
