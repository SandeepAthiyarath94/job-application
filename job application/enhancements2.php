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
	<?php include "nav.inc" ?>
	<section id="enhancement2">
		<h2>Timer</h2>
		<p> A timer with 2 mins 40 secs(200 secs) is created in forms page. <br>
		The timer is created by looping 1 sec timer for 200 times and displaying the contents outside the form<br>
		with position sticky so that it can be seen even if the screen is scrolled through.<br>
		Timer is achieved using setTimeout referenced from <a href="https://www.w3schools.com/jsref/met_win_settimeout.asp">w3schools</a><br>
		Once the time falls below 30 secs, the timer color is changed to red to warn the user<br>
		Once the timer runs out, an alert box pops up informing that the page has timed out.<br>
	 	Follow the link below to jump to the page:<br>
		<a href="apply.php#timer">Timer</a></p>
		<h2>Slide show </h2>
		<p> Slide show is achieved using the same logic of setting time intervals using setTimeout<br>
		image locations are stored in an array and then every 3 seconds the images are changed by<br>
		incrementing the array index by one.<br>
		Index value starts from 0 and once the value becomes equal to array length - 1,the index is reset to 0.<br>
		The slideshow array is also placed in a recursive infinite loop which keeps on changing<br>
		the images every 3 seconds.<br>
		setTimeout referenced from <a href="https://www.w3schools.com/jsref/met_win_settimeout.asp">w3schools</a><br>
		Slide images are introduced in jobs pages link :<a href="jobs.php#slide">slideshow</a></p>
	</section>
	<?php include "footer.inc" ?>
</body>
</html>
