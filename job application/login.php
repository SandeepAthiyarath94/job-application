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
	<script src="scripts/apply.js" rel="text/javascript"></script>
	<script src="scripts/enhancements.js" rel="text/javascript"></script>
</head>

<body>
    <?php include "header.inc" ?>
	<?php include "nav.inc" ?>
    <section>


            <?php  //Start the Session
            session_start();
            //3. If the form is submitted or not.
            //3.1 If the form is submitted
            if (isset($_POST['userid']) && isset($_POST['password'])) {
                //3.1.1 Assigning posted values to variables.
                $userid = $_POST['userid'];
                $password = $_POST['password'];
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
                    $query = "SELECT * FROM `userlogin` WHERE userid='$userid' and password='$password'";

                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    $count = mysqli_num_rows($result);
                    if ($count == 1) {
                        $_SESSION['userid'] = $userid;
                    } else {
                        $fmsg = "Invalid Login Credentials.";
                    }
                }
            }
            if (isset($_SESSION['userid'])) {
                $userid = $_SESSION['userid'];
                echo "Hi " . $userid . "";
               
                echo "<a class='btn' href='logout.php'>Logout</a>";
				header('Location: manage.php');
            } else {
            ?>
            <form class="form-signin" method="POST" action="login.php">
                <h2 class="form-signin-heading ">Please Login</h2>
                <div class="input-group">
                    <input type="text" name="userid" class="form-control" placeholder="userid" required>
                </div>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn" type="submit">Login</button>
            </form>
            <?php } ?>
    </section>
    <?php include "footer.inc" ?>
</body>

</html>