<?php
session_start();
/*******************************************************
 *
 *     CLASS SELECTION AND REGISTRATION SYSTEM
 *       from PHP and MySQL, A Beginner's Guide
 *     by Marty Matthews, published 2014 McGraw-Hill
 *
 *     singin.php  Administrator sign in. Called by
 *         adminAuthen.php and calls verify.php
 *
 ********************************************************
 *CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
 ********************************************************/
?>
<!DOCTYPE html>
<html>
   <head>
   		<meta charset="utf-8">
		<title>Student Sign In Page</title>
		<link rel= "stylesheet" type= "text/css" href= "../css/registration.css"/>
		<script language="JavaScript" type= "text/javascript"></script>
	</head>

	<!-- Put cursor in the first field -->
	<body onload="document.form1.userid.focus();">
		<!-- From template -->
		<div id="wrapper">
			<div id="header">
				<img src="../images/DepEd-Website-header-110px_1.png" alt="Department of Education" style="height: 75px;">
                <h1 id="title">TLE Course Selection and Enrolment</h1>

			</div> <!-- id="header" -->
			<div id="hnav">
				<table width="400" border="0" cellspacing="2" cellpadding="2">
  				  <tr>
			        <td><a href="../index.php">Home</a> </td>
<!-- 			        <td><a href="facisignin.php">Facilitator</a> </td> -->
<!-- 					<td><a href="facisignin.php">Facilitator</a> </td> -->
<!--                     <td><a href="../AdministratorAuthentication/signin.php">Administrator</a> </td> -->
                    <td><a href="../support.php">Support</a> </td>
                    <td><a href="../about.php">About</a></td>
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
		<h1 id="maintitle">Student Sign In</h1>
		<br />
<?php
	$retry = $_SESSION["retry"];
	if($retry < 1 ){
?>
		<p id="mainpara">Please enter your user ID and password, and click Sign In.</p>
<?php
	}
	elseif ($_SESSION["errmsg"] == 1) {
?>
		<p class="red">A User ID is required.</p>
		<p class="red">Please RE-enter your user ID and password, and click Sign In.</p>
<?php
		$_SESSION["errmsg"] = NULL;
	}
	elseif ($_SESSION["errmsg"] == 2) {
?>
		<p class="red">A Password is required.</p>
		<p class="red">Please RE-enter your user ID and password, and click Sign In.</p>
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
			<!-- From User Authentication -->
			<div id="form">
			<!-- Display the sign-in form. After filling in, go to verify page. -->
				<form action="studverify.php" method="post" name="form1">
	   				<table width="200" border="0" cellspacing="3" cellpadding="5" >
					    <tr>
        					<th width="60">User ID:</th>
        					<td width="120">
        						<input type="text" name="userid" value="" size="60" />
		        			</td>
					    </tr>
			    		<tr>
		        			<th>Password:</th>
        					<td>
   	    						<input type="password" name="passwd" value="" size="20" />
		        			</td>
    					</tr>
  					</table>
						<input type="submit" name="submit" value="Sign In" />
				</form>
				<form action="studregister.php" method="post" name="form2">
					<input type="submit" name="register" value="Register" />
				</form>
			</div>  <!-- id="form" -->
				<!-- End User Authentication -->
				<!-- Begin from template -->
				<br />
				<p class="red">All fields are required.</p>
			</div> <!-- id="main" -->
			<div id="footer">
                <p id="copyright">
                    Copyright <!-- &copy: 2008 - -->
                    <?php
                         date_default_timezone_set('Asia/Singapore');
                         echo date('Y');
                    ?>
                    &#9679 CMSC 208 Group 7
                </p>
                <p id="contact">
                     <a href="mailto:jaaguirre@up.edu.ph">Contact us by clicking here.</a>
                </p>
            </div> <!-- id="footer" -->
		</div> <!-- id="wrapper" -->
	</body>
</html>
