<?php
require_once "doorway.php" ;

/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*         classentry.php  Enter new classes.
*   Called by systementry.php and calls addclass.php
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/
?>
<!DOCTYPE html>
<html>
   <head>
   		<meta charset="utf-8">
		<title>Class Database Entry</title>
		<link rel= "stylesheet" type= "text/css" href= "/ClassRegistration/registration.css"/>
		<script language="JavaScript" type= "text/javascript"></script>
	</head>
	<!-- Put cursor in the first field -->
	<body onload="document.form1.class_title.focus();">
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
				        <td><a href="systementry.php">System Entry</a> </td>
				    </tr>
				    <tr>
				        <td><a href="classlist.php">Class Update & Delete</a>
				        </td>
				    </tr>
				</table>

			</div> <!-- id="vnav" -->
			<div id="main">
				<h1 id="maintitle">Class Database Entry</h1>
<?php
		if($_SESSION["errmsg"] < 1 ){
?>
		<p id="mainpara">Please enter class information and click Add.</p>
<?php
	}
	elseif ($_SESSION["errmsg"] == 1) {
?>
		<p class="red">A Class Title is required.</p>
		<p class="red">Please RE-enter class information and click Add.</p>
<?php
		$_SESSION["errmsg"] = NULL;
	}
	elseif ($_SESSION["errmsg"] == 2) {
?>
		<p class="red">A Start Date is required.</p>
		<p class="red">Please RE-enter class information and click Add.</p>
<?php
		$_SESSION["errmsg"] = NULL;
	}
	elseif ($_SESSION["errmsg"] == 3) {
?>
		<p class="red">A Class Descriptioon is required.</p>
		<p class="red">Please RE-enter class information and click Add.</p>
<?php
		$_SESSION["errmsg"] = NULL;
	}
	elseif ($_SESSION["errmsg"] == 4) {
?>
		<p class="red">A Class Cost is required.</p>
		<p class="red">Please RE-enter class information and click Add.</p>
<?php
		$_SESSION["errmsg"] = NULL;
	}
	elseif ($_SESSION["errmsg"] == 5) {
?>
		<p class="red">An Instructor is required.</p>
		<p class="red">Please RE-enter class information and click Add.</p>
<?php
		$_SESSION["errmsg"] = NULL;
	}
	else  {
?>
		<p class="red"> &nbsp </p>
		<p class="red">Please RE-enter your user ID and password, and click Sign In.</p>
<?php
	}
?>

				<!-- Class Entry form -->
				<form action="addclass.php" method="post" name="form1">
					<table width="600px" border="0" cellspacing="1" cellpadding="3">
 					   	<tr>
						   <th width="18%">Class Title:</th>
					       <td width="60%">
        						<input type="text" name="class_title" value="" size="60" />
					       </td>
						</tr>
					    <tr>
					        <th>Class Start Date:<span class="red">*</span></th>
					        <td>
        						<input type="text" name="class_start" value="" size="60" />
					        </td>
					    </tr>
					    <tr>
					        <th>Class Description:</th>
					        <td>
        						<textarea name="class_descr" cols="60" rows="4"></textarea>
					        </td>
					    </tr>
					    <tr>
					        <th>Class Cost:</th>
					        <td>
        						<input type="text" name="class_cost" value="" size="20" />
					        </td>
					    </tr>
					    <tr>
						    <th>Class Instructor:</th>
						    <td>
        						<input type="text" name="class_instr" value="" size="20" />
					        </td>
					    </tr>
					</table>
					<p><input type="submit" value="Add" /></p>
				</form>

				<p class="red">All fields required.<br />
					*Enter date fields as YYYYMMDD.</p>

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
