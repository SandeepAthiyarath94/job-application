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

                $query = $listAllApplications;
                if((isset($_POST["fname"]) && $_POST["fname"] != "" )){
					
                    $fname = $_POST["fname"];
                } 
                if((isset($_POST["lname"]) && $_POST["lname"] != "" )){
                    $lname = $_POST["lname"];
                }
                if((isset($_POST["jobid"]) && $_POST["jobid"] != "" )){
                    $jobid = $_POST["jobid"];
                }
                if(isset($fname)) {
                    $subquery = " where e.firstname like '%$fname%' ";
                }
                if(isset($lname)) {
                    $subquery = " where e.lastname like '%$lname%'";
                } 
                if(isset($fname) && isset($lname)) {
                    $subquery = " where e.firstname like '%$fname%' and e.lastname like '%$lname%'";
                }
                if(isset($jobid)) {
                    $subquery = " where e.refno like '%$jobid%' ";
                }
                if(isset($subquery)) {
                    $query .= $subquery;
                }

                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "<h1>List of Applicants</h1>";
                    if(isset($fname)) echo "<p>based on firstname <strong>",$fname,"</strong> </p>";
                    if(isset($lname)) echo "<p>based on lastname <strong>",$lname,"</strong> </p>";
                    if(isset($jobid)) echo "<p>based on job ref number <strong>",$jobid, "<strong> </p>";
                    echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Application No</th>";
                    echo "<th>Job Reference No</th>";
                    echo "<th>First Name / Last Name</th>";
                    echo "<th>Dat of Birth</th>";
                    echo "<th>Gender</th>";
                    echo "<th>Address</th>";
                    echo "<th>Email</th>";
                    echo "<th>Phone</th>";
                    echo "<th>Skills</th>";
                    echo "<th>Other Skill</th>";
                    echo "<th>Status</th>";
                    echo "<th>Action</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>", $row["id"], "</td>";
                        echo "<td>", $row["refno"], "</td>";
                        echo "<td>", $row["firstname"], " ", $row["lastname"], "</td>";
                        echo "<td>", $row["dob"], "</td>";
                        echo "<td>", $row["gender"], "</td>";
                        echo "<td>", $row["street"], ", ", $row["town"], ", ",$row["state"]," - ", $row["post"], "</td>";
                        echo "<td>", $row["email"], "</td>";
                        echo "<td>", $row["phone"], "</td>";
                        //$skillsJSON = $row["skills"];
					// $skillsArray = json_decode($skillsJSON, true);
                    //    $skills = implode(", ", $skillsArray);
					$skills = $row["skills"];
                        echo "<td>", $skills, "</td>";
                        echo "<td>", $row["otherskills"], "</td>";
                        echo "<td>", $row["status"], "</td>";
                        echo "<td><a href=\"deleteId.php?id=", $row["id"], "\" >Delete</a>&nbsp;<a href=\"changeStatus.php?id=", $row["id"], "&status=current\" >Current</a>&nbsp;<a href=\"changeStatus.php?id=", $row["id"], "&status=final\" >Final</a></td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    mysqli_free_result($result);
                }
            }
            mysqli_close($conn);
            ?>
    </section>
    <section>
            <h2>Search Application</h2>
            <form action="manage.php" method="post">
                <p><label>First Name: <input type="text" name="fname" /></label></p>
                <p><label>Last Name: <input type="text" name="lname" /></label></p>
                <input type="submit" value="Search" />
            </form>

            <h2>Search Application based on job ref no</h2>
            <form action="manage.php" method="post">
                <p><label>Job Referenece No: <input type="text" name="jobid" /></label></p>
                <input type="submit" value="Search" />
            </form>

            <h2>Delete based on job reference number:</h2>
            <form action="deleteJob.php" method="post">
                <p><label>Job Ref: <input type="text" name="jobid" /></label></p>
                <input type="submit" value="Delete" />
        </form> <?php } else {
                header('Location: login.php');
            }?>
    </section>
    <?php include "footer.inc" ?>
</body>

</html>