<?php
/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*    enterstu.php The email, name, and phone number
*    are written to disk. Called by stuentry.php and
*              calls confirm.php
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
//Get Class ID from checkemail.php
	$classid = ($_GET['classid']);

//Get email address from checkemail.php
	$email = ($_GET['email']);

//Remove white space, check for blank, and remove special characters
	if (($name = trim($_POST['stu_name'])) == '') {
	    echo "A blank student name was found.";
		exit();
	}
	else { $name = mysqli_real_escape_string($connection, $_POST['stu_name']);
	}
	if (($phone = trim($_POST['phone'])) == '') {
		echo "A blank phone was found.";
		exit();
	}
	else { $phone = mysqli_real_escape_string($connection, $_POST['phone']);
	}
//Add record to the student table
 	$query = "INSERT INTO student(student_email, student_name, student_phone)
			VALUES('$email', '$name', '$phone')";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Insert into student failed. ", mysqli_error($connection);
		exit();
	}

//Go to confirm.php with class id and email.
	header( "Location: confirm.php?classid=$classid&email=$email");
?>
