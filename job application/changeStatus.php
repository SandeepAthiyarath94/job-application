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
    <section>
            <?php
            session_start();
            if (isset($_SESSION['userid'])) {
                echo "<a class='btn' href=\"logout.php\">Logout</a>";
                if (!(isset($_GET["id"]) && $_GET["id"] != "" && is_numeric($_GET["id"]))) {
                    header("location: manage.php");
                    exit;
                } else {
                    $id = $_GET["id"];
                }
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
                    if ($status == "current") $finalStatus = "CURRENT";
                    if ($status == "final") $finalStatus = "FINAL";
                    $query = "UPDATE eoi SET status = '$finalStatus' WHERE id = $id";
                    $result = mysqli_query($conn, $selectQuery);
                    if (empty($result)) {
                        echo "<p>No such Id</p>";
                    } else {
                        $updateResult = mysqli_query($conn, $query);
                        if ($updateResult) {
							echo "<a href='manage.php' class='btn'>Return to manage page</a>";
                            echo "<h2>Application updated successfully</h2>";
                        } else {
							echo "<a href='manage.php' class='btn'>Return to manage page</a>";
                            echo "<h2>Error in updated application</h2>";
                        }
                    }
                }
                mysqli_close($conn);
            } else {
                header('Location: login.php');
            }
            ?>
    </section>

    <?php include "footer.inc" ?>
</body>

</html>