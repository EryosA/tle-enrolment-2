<?php
	session_start();

/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*  addclass.php Cleans the input and writes it to db..
*         Called by and calls classentry.php
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/
//Connect to the ClassRegistration database
	$connection = mysqli_connect("localhost", "root", "", "classregistration");
	if (!$connection) {
		echo "Cannot connect to MySQL. ", mysqli_connect_error($connection);
		exit();
	}
//Remove white space, check for blank, and remove special characters
	$stu_name = mysqli_real_escape_string($connection, $_POST['student_name']);
	$dressmaking = mysqli_real_escape_string($connection, $_POST['dressmaking']);
	$cookery = mysqli_real_escape_string($connection, $_POST['cookery']);
	$handycraft = mysqli_real_escape_string($connection, $_POST['handycraft']);
	$electrical = mysqli_real_escape_string($connection, $_POST['electrical']);
	$electronics = mysqli_real_escape_string($connection, $_POST['electronics']);
	$drafting = mysqli_real_escape_string($connection, $_POST['drafting']);
	$chs = mysqli_real_escape_string($connection, $_POST['chs']);
	$beauty_care = mysqli_real_escape_string($connection, $_POST['beauty_care']);
	$welding = mysqli_real_escape_string($connection, $_POST['welding']);


//Add record to the class table
	$query = "INSERT INTO grades(student_name, dressmaking, cookery, handycraft, electrical, electronics, drafting, chs, beauty_care, welding )
		VALUES('$stu_name', '$dressmaking', '$cookery', '$handycraft', '$electrical', '$electronics', '$drafting', '$chs', '$beauty_care', '$welding')";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Insert into grades failed. ", mysqli_error($connection);
		exit();
	}

tryagain:
//Return to facigradesheet.php.
	header( "Location: facigradesheet.php");
?>
