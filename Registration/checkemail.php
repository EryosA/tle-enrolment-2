<?php
	session_start();
/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
* checkemail.php The class id and email address are
* are cleaned up and then the email address is compared
* what is in the database. If it matches stuupdate.php
* is loaded. If not stuentry.php is loaded.
*            Called by emailentry.
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/

//Connect to the ClassRegistration database
	//$connection = mysqli_connect("localhost", "root", "", "classregistration");
	require_once("../config.php");
	if (!$connection) {
		echo "Cannot connect to MySQL. ", mysqli_connect_error($connection);
		exit();
	}
//Remove white space, check for blank, and remove special characters
	if (($classid = trim($_POST['classid'])) == '') {
    	echo "A blank class ID was found.";
		exit();
	}
	else {$classid = mysqli_real_escape_string($connection, $_POST['classid']);
	}
	if (($email = trim($_POST['email'])) == '') {
		echo "A blank email was found.";
		exit();
	}
	else {$email = mysqli_real_escape_string($connection, $_POST['email']);
	}

//See if match in the administrator table
	$query = "SELECT student_email FROM student
		WHERE student_email= '$email'";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Select from student failed. ", mysqli_error($connection);
		exit();
	}
//Determine if the student email is on file.
	$row = mysqli_fetch_object($result);
		$db_email = $row->student_email;

	if($db_email != $email ){

//If not, go to new student entry passing both the classid and the email
		header( "Location: stuentry.php?classid=$classid&email=$email");
			}
	else {

//If on file, go to student update, again with the classid and the email.
		header( "Location: stuupdate.php?classid=$classid&email=$email");
	}
?>
