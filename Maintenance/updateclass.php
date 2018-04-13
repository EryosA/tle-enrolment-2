<?php
	session_start();

/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*   updateclass.php Updates a class for changes made.
*     Called by classupdate and calls classlist.php.
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/

//Connect to the ClassRegistration database
	$connection = mysqli_connect("localhost", "root", "", "classregistration");
	if (!$connection) {
		echo "Cannot connect to MySQL. " . mysqli_connect_error($connection);
		exit();
	}
//Get Class ID from classupdate.php
	$classid = ($_GET['recordID']);

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
	/* adding a zero forces this to be a number not a string. */
	else {$cost = mysqli_real_escape_string($connection, $_POST['class_cost'] + 0);
	}
	if (($instr = trim($_POST['class_instr'])) == '') {
		$_SESSION["errmsg"] = 5;
		goto tryagain;
	}
	else {
		$instr = mysqli_real_escape_string($connection, $_POST['class_instr']);
	}

//Update a record on the class table
 	$query = "UPDATE class SET class_title='$title', class_start='$start', class_descr='$descr',
		class_cost='$cost', class_instr='$instr' WHERE class_id='$classid' ";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Insert into class failed. ", mysqli_error($connection);
		exit();
	}

tryagain:
//Return to classlist.php if successful.
	header( "Location: classlist.php");
?>
