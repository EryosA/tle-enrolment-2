<?php
	session_start();
/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
* verify.php The user id and password are cleaned up,
* the password is encrypted and then it and the user
* id are compared with what is in the database. If they
* match, the session variables are updated and the focus
* is transferred to the first site page. If there is not
* a match, the user is given 3 tries back in the sign in
* scrip, and then sent to the register script.
*
*Called by signin.php & calls signin.php or systementry.php
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
	if (($userid = trim($_POST['userid'])) == '') {
		$_SESSION["errmsg"] = 1;
		goto tryagain;
	}
	else {$userid = mysqli_real_escape_string($connection, $_POST['userid']);
	}
	if (($userPasswd = trim($_POST['passwd'])) == '') {
		$_SESSION["errmsg"] = 2;
		goto tryagain;
	}
	else {$userPasswd = mysqli_real_escape_string($connection, $_POST['passwd']);
	}

//Encrypt the password.
	$encryptpasswd = sha1($userPasswd);

//See if match in the student table
	$query = "SELECT student_id, password, student_name
		   FROM student
		   WHERE student_id= '$userid' AND password= '$encryptpasswd'";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Select from facilitator failed. ", mysqli_error($connection);
		exit();
	}

//Determine if the user ID and password are on file.
	$row = mysqli_fetch_object($result);
	$db_userid = $row->student_id;
	$db_password = $row->password;
	$db_name = $row->student_name;

	if($db_userid != $userid || $db_password != $encryptpasswd){

tryagain:
	//If not, add to Session Retry and test > 3
		$retry = $_SESSION["retry"];
		$retry++;
		if ($retry > 3) {
    //If greater than 3 go to register.
		   header( "Location: studregister.php");
		}
		else {
    //If less than 3 reset Session Retry and go to Sign in
		   $_SESSION["retry"] = $retry;
		   header( "Location: studsignin.php");
    	}
	}
	else {

//If on file, get name, reset the session, and enter site.
	$_SESSION["name"] = $db_name;
	$_SESSION["retry"] = "admit";
	$_SESSION["time"] = time();
	header( "Location: ../Maintenance/systementry.php");
	}
?>
