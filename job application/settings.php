<?php
	$host = "feenix-mariadb.swin.edu.au";
	$user = "s102005528"; 
	$pwd = "sandeep94";
	$sql_db = "s102005528_db";
	$sql_table= "eoi";
//	$createTableQuery = "CREATE TABLE if not exists `$sql_db`.`$sql_table` ( `eoinumber` INT NOT NULL AUTO_INCREMENT , `refno` VARCHAR(6) NOT NULL , `firstname` VARCHAR(20) NOT NULL , `lastname` VARCHAR(20) NOT NULL , `street` VARCHAR(40) NOT NULL , `suburb` VARCHAR(20) NOT NULL , `state` VARCHAR(20) NOT NULL , `postcode` INT NOT NULL , `email` VARCHAR(30) NOT NULL , `phone` VARCHAR(15) NOT NULL , `gender` VARCHAR(7) NOT NULL , `status` VARCHAR(10) NOT NULL , `dob` DATE NOT NULL , `skills` VARCHAR(100) NULL , `otherskills` VARCHAR(100) NULL , PRIMARY KEY (`eoinumber`), FOREIGN KEY (`state`)
//	REFERENCES state(`state`))";
$createTableQuery = "CREATE TABLE if not exists `$sql_db`.`$sql_table` (
							`id` INT NOT NULL AUTO_INCREMENT,
							`refno` VARCHAR(5) NOT NULL,
							`firstname` VARCHAR(25) NOT NULL,
							`lastname` VARCHAR(25) NOT NULL,
							`gender` VARCHAR(1) NOT NULL,
							`dob` DATE NOT NULL,
							`street` VARCHAR(40) NOT NULL,
							`town` VARCHAR(40) NOT NULL,
							`state` VARCHAR(3) NOT NULL,
							`post` INT NOT NULL,
							`email` VARCHAR(40) NOT NULL,
							`phone` VARCHAR(12) NOT NULL,
							`skills` VARCHAR(100) NOT NULL,
							`otherskills` VARCHAR(40) NOT NULL,
							`status` VARCHAR(10) NOT NULL,
							PRIMARY KEY (`id`))";
	$insertIntoTableQuery = "INSERT INTO `eoi`(`id`, `refno`, `firstname`, `lastname`,`gender`, `dob`, `street`, `town`, `state`, `post`, `email`, `phone`, `skills`, `otherskills` , `status`) VALUES ";
	$listAllApplications = "SELECT e.id, e.refno, e.firstname, e.lastname, e.gender, e.dob, e.street, e.town, e.state, e.post, e.email, e.phone, e.skills, e.otherskills,  e.status FROM eoi e";
?>
	
	
	