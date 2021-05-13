<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="PHP Enhancements" />
	<meta name="keywords" content="Job, IT " />
	<meta name="author" content="Sandeep Athiyarath" />
	<meta name="viewpoint" content="width=device-width, initial-scale=1" />
	<title> PHP ENHANCEMENTS </title>
	<link href="styles/style.css" rel="stylesheet" />
</head>
<body>
	<?php include "header.inc" ?>
	<?php include "menu.inc" ?>
	<section class="enhancement">
		<h2>LOGIN SECURITY</h2>
		<p> All the table manipulation pages require the manager to login using his id and password to view, update or delete applications.<br>
		This adds in security and creates a hierarchical control over who can access the stored data.<br>
		Adding a login creates security and prevents unauthorized personnals to manipulate data.<br>
		If someone tries to directly access the link for page for viewing or updating table, they are redirected to login page.<br>
		The user has to logout once he is done with his work. A logout button is added in pages which will close the session
		and redirect to login page<br><br>
		LINK TO LOGIN PAGE:<a href="userlogin.php">userlogin</a><br>
		REFERENCE:<a href="https://www.w3schools.com/howto/howto_css_login_form.asp">w3schools</a></p>
		
		<h2>REGISTER NEW UNIQUE MANAGER AND PREVENTING DUPLICATE APPLICATION BY APPLICANTS</h2>
		<p> Creating new manager details and storing it in a table which can be later used to grant access to view or process the database
		contents.<br> The new manager details are successfully stored if no duplicates are present and 
		password entered matches with reconfirmation password.<br>
		Also if an applicant tries to create 2 applications for the same job, the system throws message informing that the applicant
		has already applied for this job. <br>This is achieved by comparing the job reference id and user full name in database against the
		newly entered application form details.<br><br>
		LINK TO APPLICATION FORM :<a href="apply.php">register new manager</a><br>
		LINK TO NEW MANAGER REGISTRATION : <a href="userlogin.php">apply</a>
		</p>
	</section>
	<?php include "footer.inc" ?>
</body>
</html>
