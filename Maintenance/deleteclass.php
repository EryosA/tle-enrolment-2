<?php
/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*          deleteclass.php Deletes a class.
*     Called by classdelete and calls classlist.php.
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/

//Get Class ID from classupdate.php
	$classid = ($_GET['recordID']);

//Connect to the ClassRegistration database
	//$connection = mysqli_connect("localhost", "root", "", "classregistration");
	require_once("../config.php");
	if (!$connection) {
		echo "Cannot connect to MySQL. " . mysqli_connect_error($connection);
		exit();
	}
//Delete a record from the class table
	$query = "DELETE FROM class WHERE class_id='$classid' ";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Insert into class failed. ", mysqli_error($connection);
		exit();
	}
//Return to classlist.php.
	header( "Location: ../classlist.php");
?>
