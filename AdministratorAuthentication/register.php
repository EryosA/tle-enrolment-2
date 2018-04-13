<?php
	session_start();
/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*     register.php  Entry of a new administrator.
*     	     Called by adminAuthen.php
*          Calls entername.php from form
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/
?>
<!DOCTYPE html>
<html>
   <head>
   		<meta charset="utf-8">
		<title>Adiministrator Registration Page</title>
		<link rel= "stylesheet" type= "text/css" href= "/ClassRegistration/registration.css"/>
		<script language="JavaScript" type= "text/javascript"></script>
	</head>

	<!-- Put cursor in the first field -->
	<body onload="document.form1.admin_name.focus();">
		<!-- From template -->
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
				<!-- Placeholder only -->
				<table width="120" border="0" cellspacing="2" cellpadding="2">
    				<tr>
				        <td id="vhead">&nbsp</td>
				    </tr>
					<tr>
				        <td>&nbsp</td>
				    </tr>
				    <tr>
				        <td>&nbsp</td>
				    </tr>
				</table>

			</div> <!-- id="vnav" -->
			<!-- END Pure Template -->
			<div id="main">
				<h1 id="maintitle">Administrator Registration</h1>
				<br />
<?php
	if($_SESSION["errmsg"] < 1 ){
?>
		<p id="mainpara">Please enter your name, user ID, and password, and click Register.</p>
<?php
	}
	elseif ($_SESSION["errmsg"] == 1) {
?>
		<p class="red">Your name is required.</p>
		<p class="red">Please RE-enter your name, user ID, and password, and click Register.</p>
<?php
/*		$_SESSION["errmsg"] = NULL;*/
	}
	elseif ($_SESSION["errmsg"] == 2) {
?>
		<p class="red">A User ID is required.</p>
		<p class="red">Please RE-enter your name, user ID, and password, and click Register.</p>
<?php
/*		$_SESSION["errmsg"] = NULL;*/
	}
	elseif ($_SESSION["errmsg"] == 3) {
?>
		<p class="red">A Password is required.</p>
		<p class="red">Please RE-enter your name, user ID, and password, and click Register.</p>
<?php
/*		$_SESSION["errmsg"] = NULL;*/
	}
	else  {
?>
		<p class="red"> &nbsp </p>
		<p class="red">Please RE-enter your name, user ID, and password, and click Register.</p>
<?php
	}
?>
				<!-- From User Authentication -->
				<div id="form">
						<!-- Go to enterName.php after clicking Register -->
						<form action="enterName.php" method="post" name="form1">
	   					<table width="300" border="0" cellspacing="1" cellpadding="3" >
					      <tr>
        					<th width="30%">Name:</th>
        					<td width="50%">
        						<input type="text" name="admin_name" value="" size="60" />
		        			</td>
					      </tr>
						  <tr>
        					<th>User ID:</th>
        					<td>
        						<input type="text" name="admin_id" value="" size="20" />
		        			</td>
					      </tr>
			    		  <tr>
		        			<th>Password:</th>
		        			<td>
   	    						<input type="password" name="admin_password" value="" size="20" />
        					</td>
		    			  </tr>
  					  </table>
						 <br />
						 <input type="submit" name="submit" value="Register" />
					</form>
				</div> <!-- id=form -->
				<!-- End User Authentication -->
				<!-- Begin from template -->
				<br />
				<p class="red">All fields are required.</p>
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
