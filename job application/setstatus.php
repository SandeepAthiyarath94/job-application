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
			<h2>SET STATUS</h2>
            <?php
            session_start();
			//check if session established by user logged in, else the page is redirected to login page
            if (isset($_SESSION['userid'])) {
                echo "<a class='btn' href=\"userlogout.php\">Logout</a>";
                if (!(isset($_GET["id"]) && $_GET["id"] != "" && is_numeric($_GET["id"]))) {
                    header("location: manage.php");
                    exit;
                } else {
                    $id = $_GET["id"];
                }
				//check for status is set or not, if not set the page is redirected to manage.php
                if (!(isset($_GET["status"]) && $_GET["status"] != "" && ($_GET["status"] == "current" || $_GET["status"] == "final"))) {
                    header("location: manage.php");
                    exit;
                } else {
                    $status = $_GET["status"];
                }
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
                    $selectQuery = "select * from eoi where id = $id";
                    $finalStatus = "";
					// set status to current or final based on user selection
                    if ($status == "current") $finalStatus = "CURRENT";
                    if ($status == "final") $finalStatus = "FINAL";
					//update the status for the particular id
                    $query = "UPDATE eoi SET status = '$finalStatus' WHERE id = $id";
                    $result = mysqli_query($conn, $selectQuery);
                    if (empty($result)) {
                        echo "<p>The id does not exist.</p>";
                    } else {
                        $updateResult = mysqli_query($conn, $query);
                        if ($updateResult) {
							echo "<a href='manage.php' class='btn'>Return to manage page</a>";
                            echo "<h2>Updated application successfully</h2>";
                        } else {
							echo "<a href='manage.php' class='btn'>Return to manage page</a>";
                            echo "<h2>Error in updating application</h2>";
                        }
                    }
                }
                mysqli_close($conn);
            } else {
                header('Location: userlogin.php');
            }
            ?>
    </section>

    <?php include "footer.inc" ?>
</body>

</html>