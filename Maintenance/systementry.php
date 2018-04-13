<?php
	session_start();

/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*     systementry.php  Check if user has a cookie.
*       Called by entername.php or verify.php
*
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/

//Check to see if session retry is "admit. (copy of entersite.php)"
if (isset($_SESSION["retry"])&& $_SESSION["retry"] == "admit") {
	//If so, continue.
	$name = $_SESSION["name"];
}
else {
	header( "Location: /ClassRegistration/AdministratorAuthentication/adminAuthen.php");
}
?>
<!DOCTYPE html>
<html>
   <head>
   		<meta charset="utf-8">
		<title>Database Entry and Maintenance - Entry</title>
		<link rel= "stylesheet" type= "text/css" href= "/ClassRegistration/registration.css"/>
	</head>

	<body>
		<div id="wrapper">
			<div id="header">
				<img src="/ClassRegistration/MatTechLogo.gif" alt="Matthews Technology" />
				<h1 id="title">Class Selection and Registration</h1>

			</div> <!-- id="header" -->
			<div id="hnav">
				<table width="400" border="0" cellspacing="2" cellpadding="2">
  				  <tr>
			        <td><a href="/ClassRegistration/index.php">Home</a> </td>
			        <td><a href="/ClassRegistration/index.php">About</a> </td>
			        <td><a href="/ClassRegistration/index.php">Support</a> </td>
			        <td><a href="/ClassRegistration/AdministratorAuthentication/adminAuthen.php">Maintain</a> </td>
  		    	  </tr>
				</table>

			</div> <!-- id="hnav" -->
			<div id="vnav">
				<table width="120" border="0" cellspacing="2" cellpadding="2">
    				<tr>
				        <td id="vhead">Go To: </td>
				    </tr>
					<tr>
				        <td><a href="classentry.php">Enter New Classes</a> </td>
				    </tr>
				    <tr>
				        <td><a href="classlist.php">Update & Delete Classes</a>
				        </td>
				    </tr>
				</table>

			</div> <!-- id="vnav" -->
			<div id="main">
				<h1 id="maintitle">Database Entry and Maintenance</h1>
				<br />
				<p id="mainpara">Hello
<?php
				echo $name;
?>
				</p>
				<br />
				<p id="mainpara">Please choose the task you want to<br />
					perform from the menu on the left.</p>
				<!-- <p id="footnote">*A footnote.</p> -->

			</div> <!-- id="main" -->
			<div id="footer">
				<p id="copyright">
					Copyright &copy:2008 -
					<?php
						 date_default_timezone_set('America/Vancouver');
						 echo date('Y');
					?>
					Matthews Technology
				</p>
				<p id="contact">
					 <a href="mailto:info@matthewstechnology.com">Contact us by clicking here.</a>
				</p>
			</div> <!-- id="footer" -->
		</div> <!-- id="wrapper" -->
	</body>
</html>
