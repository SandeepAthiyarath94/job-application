<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Homepage for an IT company" />
	<meta name="keywords" content="Job, IT " />
	<meta name="author" content="Sandeep Athiyarath" />
	<meta name="viewpoint" content="width=device-width, initial-scale=1" />
	<title> JOB APPLICATIONS </title>
	<link href="styles/style.css" rel="stylesheet" />
	<script src="scripts/apply.js" rel="text/javascript"></script>
	<script src="scripts/enhancements.js" rel="text/javascript"></script>
</head>
<body>
  <?php include "header.inc" ?>
  <?php include "nav.inc" ?>
  <article>
    <h2>Apply for the post</h2>
    <section>
			<p id="timer"></p>
      <h3>PLEASE FILL IN THE FORM BELOW TO APPLY</h3>
      <form id="regform" novalidate="novalidate" method="POST" action="processEOI.php">
				<fieldset>
						<legend>Personnal Details</legend>
						<p><label for="ref"><strong>Reference Number</strong></label>
        		<input id="ref" type="text" readonly="readonly" name="refno" required="required" placeholder="Exact 5 digits or letters" pattern="[a-zA-Z0-9]{5}" maxlength="5" size="20" /></p>
						<p><label for="fname"><strong>First Name</strong></label>
		        <input id="fname" type="text" name="firstname" required="required" pattern="^[a-z A-Z]+$" placeholder="max 20 characters" maxlength="20" /></p>
						<p><label for="lname"><strong>Last Name</strong></label>
		        <input id="lname" type="text" name="LastName" required="required" pattern="^[a-z A-Z]+$" maxlength="20" placeholder="max 20 characters" /></p>
						<p><label for="dob"><strong>Date of birth</strong>&nbsp;</label>
		        <input type="text" name="dob" id="dob" placeholder="dd/mm/yyyy" pattern="\d{1,2}\/\d{1,2}\/\d{4}" required="required"/></p>
						<!--<input type="date" name="date" id="dob" required="required"/></p>-->
						<p class="error" id="ageerror"></p>
						<fieldset>
							<legend>Gender</legend>
							<p><label><strong>Gender</strong>&nbsp;
							<input type="radio" name="gender" value="M" required="required"  />male&nbsp;&nbsp;&nbsp;&nbsp;</label>
							<label><input type="radio" name="gender" value="F" required="required"  />female</label>
							<label><input type="radio" name="gender" value="O" required="required"  />Other</label>
							<label><input type="radio" name="gender" value="N" required="required"  />Prefer not to say</label></p>
            </fieldset>
				    <fieldset>
					  	<legend>Address</legend>
							<p><label for="street"><strong>Street Address</strong></label>
				      <input id="street" type="text" name="StreetAddress" required="required" placeholder="max 40 characters" maxlength="40" /></p>
							<p><label for="sub"><strong>Suburb/town</strong></label>
			        <input id="sub" type="text" name="Suburb" required="required" placeholder="max 40 characters" pattern="^[a-z A-Z]+$" maxlength="40" /></p>
							<label for="state"><strong>State</strong><select id="state" name="state" required="required">
								<option value=""> Select state</option>
								<option value="VIC"> VIC </option>
								<option value="NSW"> NSW </option>
								<option value="QLD"> QLD </option>
								<option value="NT"> NT </option>
								<option value="WA"> WA </option>
								<option value="SA"> SA </option>
								<option value="TAS"> TAS </option>
								<option value="ACT"> ACT </option>
							</select></label>
							<p><label for="post"><strong>Post code</strong></label>
	        		<input id="post" type="text" name="post" required="required" placeholder="exactly 4 digits" pattern="\d{4}" maxlength="4" size="20" /></p>
							<p class="error" id="addresserror"></p>
						</fieldset>
						<fieldset>
					  	<legend>Contat details</legend>
							<p><label for="email"><strong>e-mail</strong><input id="email" type="email" name="email" required="required" /></label>
							<p><label for="ph"><strong>Phone </strong></label>
	        		<input id="ph" type="text" name="phone" required="required" pattern="[0-9 ]{8,12}" maxlength="12" size="20" placeholder="8 to 12 digits(spaces are allowed)" /></p>
						</fieldset>
						<fieldset> 
							<legend>Skills</legend>
							<p><label for="skill1"><strong>Skills</strong><input type="checkbox" id="skill1" name="skills[]" value="Proficient Communication" checked="checked" required="required" />Proficient Communication</label>
							<label for="skill2"><input id="skill2" type="checkbox" name="skills[]" value="Team player" />Team player</label>
							<label for="skill3"><input id="skill3" type="checkbox" name="skills[]" value="Resilience"  />Resilience</label>
							<label for="skill4"><input id="skill4" type="checkbox" name="skills[]" value="problem solving and decision making"  />problem solving and decision making</label>
							<label for="other"><input id="other" type="checkbox" name="skills[]" value="other"  />other</label></p>
							<textarea id="comments" name=comments rows="5" cols="40" placeholder="Enter other skills here"></textarea>
							<p class="error" id="skillserror"></p>
						</fieldset>
			  </fieldset>
			  <input type="hidden" name="fromForm" value="true" />
				<p><span id="errmsg"></span></p>
				<input type="submit" value="Apply Now" />
				<input type="reset" value="Clear Form" />
      </form>
    </section>
  </article>
  <?php include "footer.inc" ?>
</body>
</html>
