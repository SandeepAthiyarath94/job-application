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
</head>

<body>
    <?php include "header.inc" ?>
	<?php include "menu.inc" ?>
    <section>
			<h2>REGISTER NEW MANAGER</h2>
            <?php
            session_start();
			$errMsg = "";
			//check if session established by user logged in, else the page is redirected to login page
			if (isset($_POST['newuserid'])){
				$newuserid = $_POST['newuserid'];
			}else{
				$errMsg.="Please enter in a user id";
				//echo $errMsg;
			}
			
			if (isset($_POST['newpassword'])){
				$newpassword = $_POST['newpassword'];
			}else{
				$errMsg.="Please enter in a password";
				//echo $errMsg;
			}
			if (isset($_POST['confirmpassword'])){
				$confirmpassword = $_POST['confirmpassword'];
			}else{
				$errMsg.="Please enter password again";
				//echo $errMsg;
			}
			if($confirmpassword!=$newpassword)
				echo "<p>Password do not match</p>";
			if($confirmpassword==$newpassword && $errMsg==""){
				$validdata = true;
			}else{
				$validdata = false;
				
			}
			$createTableQuery = "CREATE TABLE if not exists `userlogin` (
							userid VARCHAR(15) NOT NULL PRIMARY KEY,
							password VARCHAR(20) NOT NULL);";
			$insertIntoTableQuery = "INSERT INTO userlogin(
					`userid`, `password`) 
					VALUES ";
			if($validdata){
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
					$createtable = mysqli_query($conn, $createTableQuery) or die ('Error in creating table');
					$insertQuery = $insertIntoTableQuery."('$newuserid','$newpassword')";
					
					$result = mysqli_query($conn, $insertQuery) 
					or die ("User id already exists....<br>Error in inserting value to table<p><a class='btn' href='userlogin.php'>Back</a><br><br><br></p>");
					if($result){
						echo "<p>Successfully inserted credentials";
					}
					echo "<a class='btn' href='userlogin.php'>Return to login page</a>";
                }
				
			}else{
				echo "<p>Error creating new user, please try again....<br><br><br><br></p>";
				echo "<p><a class='btn' href='userlogin.php'>Back</a><br><br><br></p>";
			}
				
            ?>
    </section>

    <?php include "footer.inc" ?>
</body>

</html>