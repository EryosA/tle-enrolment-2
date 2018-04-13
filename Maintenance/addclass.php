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
	if (($title = trim($_POST['class_title'])) == '') {
		$_SESSION["errmsg"] = 1;
		goto tryagain;
	}
	else {$title = mysqli_real_escape_string($connection, $_POST['class_title']);
	}
	if (($start = trim($_POST['class_start'])) == '') {
		$_SESSION["errmsg"] = 2;
		goto tryagain;
	}
	else {$start = mysqli_real_escape_string($connection, $_POST['class_start']);
	}
	if (($descr = trim($_POST['class_descr'])) == '') {
		$_SESSION["errmsg"] = 3;
		goto tryagain;
	}
	else {$descr = mysqli_real_escape_string($connection, $_POST['class_descr']);
	}
	if (($cost = trim($_POST['class_cost'])) == '') {
		$_SESSION["errmsg"] = 4;
		goto tryagain;
	}
	else {
	$cost = mysqli_real_escape_string($connection, $_POST['class_cost']);
	}
	if (($instr = trim($_POST['class_instr'])) == '') {
		$_SESSION["errmsg"] = 5;
		goto tryagain;
	}
	else {$instr = mysqli_real_escape_string($connection, $_POST['class_instr']);
	}
//Add record to the class table
	$query = "INSERT INTO class(class_title, class_start, class_descr, class_cost, class_instr)
		VALUES('$title', '$start', '$descr', '$cost', '$instr')";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Insert into class failed. ", mysqli_error($connection);
		exit();
	}

tryagain:
//Return to classentry.php.
	header( "Location: classentry.php");
?>
