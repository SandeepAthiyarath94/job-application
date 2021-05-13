<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Homepage for an IT company" />
	<meta name="keywords" content="Job, IT " />
	<meta name="author" content="Sandeep Athiyarath" />
	<meta name="viewpoint" content="width=device-width, initial-scale=1" />
	<title> ABOUT AUTHOR </title>
	<link href="styles/style.css" rel="stylesheet"/>

</head>
<body>
	<?php include "header.inc" ?>
	<?php include "nav.inc" ?>
	<section id="aboutsection">
    <h2>ABOUT AUTHOR</h2>
    <hr/>
    <dl>
      <dt><strong>Name</strong></dt>
      <dd>Sandeep Athiyarath</dd>
      <dt><strong>Student ID</strong></dt>
      <dd>102005528</dd>
      <dt><strong>Tutor</strong></dt>
      <dd>Grace Xtao</dd>
      <dt><strong>Course</strong></dt>
      <dd>Masters in Information Technology</dd>
    </dl>
		<aside>
			<figure id="myphoto">
				<img id=photo src="images/sandeep.jpg" alt="sandeep" width="120" height="160" />
				<figcaption>Sandeep Athiyarath - Project Manager,RNT</figcaption>
			</figure>
		</aside>
	</section>

	<section>
		<h3>Time Table</h3>
		<table>
			<caption>Semester 1 Timetable</caption>
			<thead>
				<tr>
					<th>Course</th>
					<th>Day</th>
					<th>Timing</th>
					<th>Tutor</th>
					<th>Lab / Lecture</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="col1" rowspan="2"> Creating Web Applications</td>
					<td rowspan="1"> Monday </td>
					<td rowspan="1"> 4:30 pm - 6:30 pm</td>
					<td rowspan="1"> Grace Xtao</td>
					<td rowspan="1"> Lecture </td>
				</tr>
				<tr>
					<td rowspan="1"> Wednesday </td>
					<td rowspan="1"> 10:30 am - 12:30 pm</td>
					<td rowspan="1"> William </td>
					<td rowspan="1"> Lab </td>
				</tr>
				<tr>
			  	<td class="col1" rowspan="2"> Introduction to programming</td>
				  <td rowspan="1"> Wednesday </td>
					<td rowspan="1"> 12:30 pm - 2:30 pm</td>
					<td rowspan="1"> Mathew Mitchel</td>
					<td rowspan="1"> Lecture </td>
				</tr>
				<tr>
					<td rowspan="1"> Thursday </td>
					<td rowspan="1"> 2:30 pm - 4:30 pm</td>
					<td rowspan="1"> Sunil Samant</td>
					<td rowspan="1"> Lab </td>
				</tr>
				<tr>
					<td class="col1" rowspan="2"> Database analysis and design</td>
					<td rowspan="1"> Tuesday </td>
					<td rowspan="1"> 5:30 pm - 7:30 pm</td>
					<td rowspan="1"> Aung Pyae</td>
					<td rowspan="1"> Lecture </td>
				</tr>
				<tr>
					<td rowspan="1"> Wednesday </td>
					<td rowspan="1"> 7:30 pm - 9:30 pm</td>
					<td rowspan="1"> Zahirabbas Nagori</td>
					<td rowspan="1"> Lab </td>
				</tr>
				<tr>
					<td class="col1" rowspan="2"> Introduction to buisness information Systems</td>
					<td rowspan="1"> Monday </td>
					<td rowspan="1"> 5:30 pm - 7:30 pm</td>
					<td rowspan="1"> Tanya Linden</td>
					<td rowspan="1"> Lecture </td>
				</tr>
				<tr>
					<td rowspan="1"> Tuesday </td>
					<td rowspan="1"> 7:30 pm - 9:30 pm</td>
					<td rowspan="1"> Som Kitjongthawonkul</td>
					<td rowspan="1"> Lab </td>
				</tr>
			</tbody>
		</table>

		<p id="mail">Mail id : <a href="102005528@student.swin.edu.au">102005528@student.swin.edu.au</a></p>

		<img id="maps" src="images/map.jpg" alt="image mapping to facebook" width="500" height="332" usemap="#map" />
		<map name="map"><area href="https://facebook.com" alt="Facebook" target="_blank" shape=poly coords="30,100,140,50,290,220,180,280">
		<area href="https://www.google.com/maps/place/11+Flockhart+St,+Abbotsford+VIC+3067/@-37.8099743,145.0047391,17z/data=!3m1!4b1!4m5!3m4!1s0x6ad642553e1114c9:0x65db9b463832c6b6!8m2!3d-37.8099743!4d145.0069278"
		alt="Facebook" target="_blank" shape=poly coords="350,290,500,290,500,322,350,332"></map>

	</section>
	<?php include "footer.inc" ?>
</body>
</html>
