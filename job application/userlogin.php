<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Homepage for an IT company" />
	<meta name="keywords" content="Job, IT " />
	<meta name="author" content="Sandeep Athiyarath" />
	<meta name="viewpoint" content="width=device-width, initial-scale=1" />
	<title> LOGIN </title>
	<link href="styles/style.css" rel="stylesheet" />
</head>

<body>
    <?php include "header.inc" ?>
	<?php include "menu.inc" ?>
    <section>


            <?php 
// THIS PAGE WAS CREATED WITH REFERENCE TO W3SCHOOLS(link provided in enhancements)			
            session_start();
			//check if the user id and password are entered in
            if (isset($_POST['userid']) && isset($_POST['password'])) {
                $userid = $_POST['userid'];
                $password = $_POST['password'];
				//to establish connection with database server
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
					//on successful connection, the match for entered user id and password are checked
                    $query = "SELECT * FROM `userlogin` WHERE userid='$userid' and password='$password'";
					//check for the number of matching rows
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    $count = mysqli_num_rows($result);
					//if the entered details are uniquely identified, a session is established else an error message is displayed.
                    if ($count == 1) {
                        $_SESSION['userid'] = $userid;
                    } else {
                        echo "Incorrect password or userid. Please try again...!";
                    }
                }
            }
			//The user is redirected to manage.php on successful login
            if (isset($_SESSION['userid'])) {
                $userid = $_SESSION['userid'];
                echo "Hi " . $userid . "Welcome back..!";
               
                echo "<a class='btn' href='userlogout.php'>Logout</a>";
				header('Location: manage.php');
            } else {
            ?>
            <form method="POST" action="userlogin.php">
                <h2>Please Login</h2>
                <label for="userid">User ID</label>
                <input type="text" id="userid" name="userid" placeholder="userid" required>
                <p>Password
                <input type="password" name="password" id="inputPassword" placeholder="Password" required></p>
                <button class="btn" type="submit">Login</button>
            </form>
			 <form method="POST" action="createmanager.php">
                <h2>Create new manager credentials</h2>
                <label for="newuserid">User ID</label>
                <input id="newuserid" type="text" name="newuserid" placeholder="userid" required>
                <p>Password
                <input type="password" name="newpassword" id="newPassword" placeholder="Password" required></p>
				<p>Confirm Password
                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Password" required></p>
                <button class="btn" type="submit">Login</button>
            </form>
            <?php } ?>
    </section>
    <?php include "footer.inc" ?>
</body>

</html>