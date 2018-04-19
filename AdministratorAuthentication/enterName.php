<?php
	session_start();
/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
* enterName.php Called by register.php Cookie is written.
*  Then the password is encrypted and that and user id
*and the name are written to disk. Calls adminAuthen.php.
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
	if (($name = trim($_POST['admin_name'])) == '') {
		$_SESSION["errmsg"] = 1;
		goto tryagain;
	}
	else {$name = mysqli_real_escape_string($connection, $_POST['admin_name']);
	}
	if (($userid = trim($_POST['admin_id'])) == '') {
		$_SESSION["errmsg"] = 2;
		goto tryagain;
	}
	else {$userid = mysqli_real_escape_string($connection, $_POST['admin_id']);
	}
	if (($userPasswd = trim($_POST['admin_password'])) == '') {
		$_SESSION["errmsg"] = 3;
		goto tryagain;
	}
	else {$userPasswd = mysqli_real_escape_string($connection, $_POST['admin_password']);
	}

//Set cookie, expires in 180 days.
	$date = time() ;
	$expire = time()+(60*60*24*180);
	setcookie("Admin[name]", $name, $expire, "/");
	setcookie("Admin[date]", $date, $expire, "/");

//Encrypt the password.
	$encryptpasswd = sha1($userPasswd);

//See if match in the administrator table
 	$query = "SELECT admin_id, admin_password, admin_name
		   FROM administrator
		   WHERE admin_id= '$userid' AND admin_password= '$encryptpasswd'";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Select from administrator failed. ", mysqli_error($connection);
		exit();
	}

//Determine if the user ID and password are on file.
	$row = mysqli_fetch_object($result);
	$db_userid = $row->admin_id;
	$db_password = $row->admin_password;
	$db_name = $row->admin_name;

	if($db_userid != $userid || $db_password != $encryptpasswd){

//Add record to the administrator table
 		$query = "INSERT INTO administrator(admin_id, admin_password, admin_name)
			VALUES('$userid', '$encryptpasswd', '$name')";
		$result = mysqli_query($connection, $query);
    	if (!$result) {
	    	echo "Insert to administrator failed. ", mysqli_error($connection);
			exit();
    	}
tryagain:
    	//Return to adminAuthen.php.
		header( "Location: adminAuthen.php");
	}
	else {

	//If on file, get name, reset the session, and enter site.
		$_SESSION["name"] = $db_name;
		$_SESSION["retry"] = "admit";
		$_SESSION["time"] = time();
		header( "Location: /Maintenance/systementry.php");
	}
?>



