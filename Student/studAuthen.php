<?php
	session_start();
/*******************************************************
*
*      CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*     studAuthen.php  Check if user has a cookie.
*  	 If so, calls signin.php else calls register.php
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/
if (isset ($_COOKIE["Student"])) {
	//If cookie present, set Session and go to sign in.
			$_SESSION["name"] = $_COOKIE["Student"][name];
			$_SESSION["retry"] = 0;
			$_SESSION["errmsg"] = 0;
			$_SESSION["time"] = time();
   			header( "Location: studsignin.php");
		}
		else {
			//If not, go to registration.
		   	header( "Location: studregister.php");
		}
?>
