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
        <div class="container">
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo "<a href=\"logout.php\">Logout</a>";
                if (!(isset($_POST["jobid"]) && $_POST["jobid"] != "")) {
                    header("location: manage.php");
                    exit;
                } else {
                    $jobrefum = $_POST["jobid"];
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
                    $selectQuery = "select * from eoi where jobrefnumber = '$jobrefum'";
                    $query = "DELETE FROM `eoi` WHERE jobrefnumber = '$jobrefum'";
                    $result = mysqli_query($conn, $selectQuery);
                    if (empty($result)) {
                        echo "<p>No jobs with the referenec number</p>";
                    } else {
                        $deleteResult = mysqli_query($conn, $query);
                        if ($deleteResult) {
                            echo "<h2>" . mysqli_affected_rows($conn) . " record deleted. </h2>";
                        } else {
                            echo "<h2>Error in deleting applications</h2>";
                        }
                    }
                }
                mysqli_close($conn);
            } else {
                header('Location: login.php');
            }
            ?>
        </div>
    </section>

    <?php include "footer.inc" ?>
</body>

</html>