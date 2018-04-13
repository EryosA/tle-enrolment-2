<?php
	session_start();
/*****************************************************
*
*    CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*     doorway.php  Having successfully signed in...
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/

//Check to see if session retry is "admit."
if (isset($_SESSION["retry"])&& $_SESSION["retry"] == "admit") {
	//If so, continue.
	$name = $_SESSION["name"];
}
else {
	header( "Location: /ClassRegistration/AdministratorAuthentication/adminAuthen.php");
}

?>
