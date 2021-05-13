<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Homepage for an IT company" />
	<meta name="keywords" content="Job, IT " />
	<meta name="author" content="Sandeep Athiyarath" />
	<meta name="viewpoint" content="width=device-width, initial-scale=1" />
	<title> HOME PAGE </title>
	<link href="styles/style.css" rel="stylesheet" />
</head>
	<body>
		<?php include "header.inc" ?>
		<?php include "nav.inc" ?>
		<section>
				<?php
				$errMsg ="";
				$skills="";
				function sanitise_input($data)
				{
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
				if (isset($_POST["refno"]) && $_POST["refno"] != "") {
					$refno = sanitise_input($_POST["refno"]);
				}
				if ($refno == "" || $refno == null || !isset($refno)) {
					$errMsg .= "<p>You must enter job reference no</p>";
				}
				if (!preg_match("/^[a-zA-Z0-9]{5}$/", $refno)) {
					$errMsg .= "<p>Invalid application no format.</p>";
				}
				if (isset($_POST["firstname"]) && $_POST["firstname"] != "") {
					$firstname = sanitise_input($_POST["firstname"]);
				} else {
					$errMsg .= "<p>You must enter first name</p>";
				}
				if (!preg_match("/^[a-zA-Z]{1,20}$/", $firstname)) {
					$errMsg .= "<p>Invalid First Name.</p>";
				}
				if (isset($_POST["LastName"]) && $_POST["LastName"] != "") {
					$lastname = sanitise_input($_POST["LastName"]);
				} else {
					$errMsg .= "<p>You must enter last name</p>";
				}
				if (!preg_match("/^[a-zA-Z]{1,20}$/", $lastname)) {
					$errMsg .= "<p>Invalid Last Name.</p>";
				}
				if (isset($_POST["gender"]) && $_POST["gender"] != "") {
					$gender = sanitise_input($_POST["gender"]);
				} else {
					$errMsg .= "<p>You must enter gender</p>";
				}
				if (isset($_POST["StreetAddress"]) && $_POST["StreetAddress"] != "") {
					$street = sanitise_input($_POST["StreetAddress"]);
				} else {
					$errMsg .= "<p>You must enter street</p>";
				}
				if (!preg_match("/^.{1,40}$/", $street)) {
					$errMsg .= "<p>Invalid street.</p>";
				}
				if (isset($_POST["Suburb"]) && $_POST["Suburb"] != "") {
					$town = sanitise_input($_POST["Suburb"]);
				} else {
					$errMsg .= "<p>You must enter town</p>";
				}
				if (!preg_match("/^.{1,40}$/", $town)) {
					$errMsg .= "<p>Invalid town.</p>";
				}
				if (isset($_POST["state"]) && $_POST["state"] != "") {
					$state = sanitise_input($_POST["state"]);
				} else {
					$errMsg .= "<p>You must enter state</p>";
				}
				if (isset($_POST["post"]) && is_numeric($_POST["post"])) {
					$post = sanitise_input($_POST["post"]);
				} else {
					$errMsg .= "<p>You must enter post</p>";
					echo $post,'is the code';
				}
				if (checkpost($post, $state) != "") {
					$errMsg .= checkpost($post, $state);
				}
				if (isset($_POST["email"]) && $_POST["email"] != "") {
					$email = sanitise_input($_POST["email"]);
				} else {
					$errMsg .= "<p>You must enter email</p>";
				}
				if (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/", $email)) {
					$errMsg .= "<p>Invalid email.</p>";
				}
				if (isset($_POST["phone"]) && $_POST["phone"] != "") {
					$phone = sanitise_input($_POST["phone"]);
				} else {
					$errMsg .= "<p>You must enter phone</p>";
				}
				if (!preg_match("/^[0-9 ]{8,12}$/", $phone)) {
					$errMsg .= "<p>Invalid phone.</p>";
				}
				if (isset($_POST["dob"]) && $_POST["dob"] != "") {
					$dob = sanitise_input($_POST["dob"]);
				} else {
					$errMsg .= "<p>You must enter dob</p>";
				}
			/*	if (!preg_match("/^([0-2][0-9]|[3][0-1])\/([0][0-9]|[1][0-2])\/([1-2][0-9]{3})$/", $dob)) {
					$errMsg .= "<p>Invalid dob.</p>";
				}*/
				$datecheck = explode("/",$dob);
				echo $datecheck[1],'/',$datecheck[0],'/',$datecheck[2];
				if (!checkdate($datecheck[1], $datecheck[0], $datecheck[2])) {
					$errMsg .= "<p>Invalid dob.</p>";
				}
				if(!empty($_POST['skills'])){
				// Loop to store and display values of individual checked checkbox.
					foreach($_POST['skills'] as $selected){
						$skills.= "$selected,";
					}
				}
				else{
					$errMsg .= "<p>No skills selected.</p>";
				}
		//		if(!(isset($_POST["fromForm"]) && $_POST["fromForm"] == "true")){
		//			header("location: apply.php");exit;
		//		}
				if($errMsg!=""){
					echo $errMsg;
					$errMsg = "";
				}
				
				function checkpost($post, $state)
				{
					$postFirstDigit = intval($post / 1000);
					$errMsg = "";
					switch ($state) {
						case "VIC":
							if (!($postFirstDigit == 3 || $postFirstDigit == 8)) {
								$errMsg .= "<p>This is not a post code for victoria\n</p>";
							}
							break;
						case "NSW":
							if (!($postFirstDigit == 1 || $postFirstDigit == 2)) {
								$errMsg .= "<p>This is not a post code for NSW\n</p>";
							}
							break;
						case "QLD":
							if (!($postFirstDigit == 4 || $postFirstDigit == 9)) {
								$errMsg .= "<p>This is not a post code for QLD\n</p>";
							}
							break;
						case "NT":
							if (!($postFirstDigit == 0)) {
								$errMsg .= "<p>This is not a post code for NT\n</p>";
							}
							break;
						case "WA":
							if (!($postFirstDigit == 6)) {
								$errMsg .= "<p>This is not a post code for WA\n</p>";
							}
							break;
						case "SA":
							if (!($postFirstDigit == 5)) {
								$errMsg .= "<p>This is not a post code for SA\n</p>";
							}
							break;
						case "TAS":
							if (!($postFirstDigit == 7)) {
								$errMsg .= "<p>This is not a post code for TAS\n</p>";
							}
							break;
						case "ACT":
							if (!($postFirstDigit == 0)) {
								$errMsg .= "<p>This is not a post code for ACT\n</p>";
							}
							break;
						default:
							$errMsg .= "<p>This is not a valid state\n</p>";
					}
					return $errMsg;
				}

				function calculateAge($dob)
				{
					$dateofbirth = new DateTime($dob);
					$today = new Datetime(date('m.d.y'));
					$diff = $today->diff($dateofbirth);
					$age = $diff->y;
					$errMsg = "";
					if ($age < 15 || $age > 80) {
						$errMsg .= "<p>You do not meet age criteria.</p>";
					}
					return $errMsg;
				}

				$dobarray = explode("/",$dob);
				$dateofbirth = $dobarray[1]."/".$dobarray[0]."/".$dobarray[2];
				if (calculateAge($dateofbirth) != "") {
					$errMsg .= calculateAge($dateofbirth);
					echo $errMsg;
					return;
				}
				if(!empty($_POST['skills'])){
						foreach ($_POST['skills'] as $skill) {
							if ($skill == "other") {
								if (isset($_POST["comments"]) && $_POST["comments"] != "") {
									$otherskills = sanitise_input($_POST["comments"]);
								} else {
									$errMsg .= "<p>You must enter other skills";
									echo $errMsg;
									return;
								}
							}
						}
				}

/*				$skillsJSON = json_encode($skills);*/
				$other = "";
				if(isset($otherskills)) $other = $otherskills;
				//$other="SQL";
				//$skills="test";
				$status = "NEW";
				$dateofbirth = new DateTime($dateofbirth);
				$date = $dateofbirth->format('Y-m-d');

				

				require_once("settings.php");
				$conn = @mysqli_connect(
					$host,
					$user,
					$pwd,
					$sql_db
				);
				if (!$conn) {
					echo "<p>Database connection failure</p>";
				} else {
				//	$skillsJSON = mysqli_real_escape_string($conn,$skillsJSON);
				//	$insertQuery = $insertIntoTableQuery."(NULL,'$refno','$firstname','$lastname','$street','$town','$state',$post,'$email','$phone','$gender','$status','$date','$skillsJSON','$other')";
					$insertQuery = $insertIntoTableQuery."(NULL,'$refno','$firstname','$lastname','$gender','$date','$street','$town','$state',$post,'$email','$phone','$skills','$other','$status')";
					$query = "SELECT eoinumber FROM eoi";
					$result = mysqli_query($conn, $query);
					//if (empty($result)) {
						$query = $createTableQuery;
						$result = mysqli_query($conn, $query) or die('Error in creating table');    
					//}
					if($errMsg==""){
						$insertResult = mysqli_query($conn, $insertQuery)
							or die('Error in inserting');
						echo "<h1>Your Application has been accepted. Your application number is ", mysqli_insert_id($conn), "</h1>";
					}
				}
				mysqli_close($conn);
				?>
		</section>

		<?php include "footer.inc" ?>
	</body>

</html>