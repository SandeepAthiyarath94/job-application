<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Homepage for an IT company" />
	<meta name="keywords" content="Job, IT " />
	<meta name="author" content="Sandeep Athiyarath" />
	<meta name="viewpoint" content="width=device-width, initial-scale=1" />
	<title> ENHANCEMENT DETAILS </title>
	<link href="styles/style.css" rel="stylesheet" />
</head>
<body>
	<?php include "header.inc" ?>
	<?php include "nav.inc" ?>
		<section id="enhancement">
			<h2>Main Enhancement : Mobile friendly</h2>
			<p> The normal HTML page designed for a computer may not be user friendly in a smaller screen
					sized device like a tablet or a mobile.<br/> The user might need to scroll sideways to see to the
					right most end of the web page. So inorder to make the page more user friendly for mobile devices,
					a sightly different layout is used by utilising the media query to define a breakpoint.<br/>
					<strong>No third party reference</strong> was used for this purpose as this is an extension of the usage of the
					media query.<br/>The entire webpage including images, font, navigation bar, background are all slightly modified in all pages to
					provide a better visual impact for mobile users. This takes the responsiveness and user
					friendliness of a website a step further</p>
			<h2>Other enhancements </h2>
			<p>Basic animations are introduced for text and background image in home page using @keyframes. The logo rotates
				360 degrees on mouse hover(using transform) and the <a href="about.php#myphoto">photo</a> in about page flips 180 degree on mouse hover.
				<a href="jobs.php#jobsection1">Aside section border colors</a> keeps changing indefinetly.
				This is something extra added beyond the requirement of the assignment.(Reference <a href="https://www.w3schools.com/css/css3_animations.asp" target="_blank">W3schools</a>)
			</p>
			<p>Use of image maps to create overlaying hyperlinks over an image in the about page. This helps to include multiple hyperlinks to be overlayed
			on a single image. For example, the picture at the following link provides 2 hyperlinks, over the phone to move to Facebook and a click on my location
		to move into the maps showing my address.(Reference <a href="https://www.w3schools.com/tags/tag_map.asp" target="_blank">W3schools</a>)
			Link: <a href="about.php#maps">go to image maps</a></p>
			<p>A dropdown menu for careers in navigation bar which can direct to a specific job in the jobs.php</p>
		</section>
	<?php include "footer.inc" ?>
</body>
</html>
