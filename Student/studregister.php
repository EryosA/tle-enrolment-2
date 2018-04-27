<?php
	session_start();
/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*     register.php  Entry of a new user.
*     	     Called by studAuthen.php
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
		<title>Student Registration Page</title>
		<link rel= "stylesheet" type= "text/css" href="../css/registration.css"/>
		<script language="JavaScript" type= "text/javascript"></script>

	</head>

	<!-- Put cursor in the first field -->
	<body onload="document.form1.stud_name.focus();">
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
                    <td><a href="../about.php">About</a></td>
                    <td><a href="../support.php">Support</a> </td>
<!-- 										<td><a href="facisignin.php">Facilitator</a> </td> -->
<!--                     <td><a href="../faciistratorAuthentication/faciAuthen.php">Maintain</a> </td> -->
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
				<h1 id="maintitle">Student Registration</h1>
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
						<form action="studenterName.php" method="post" name="form2">
	   					<table width="300" border="0" cellspacing="1" cellpadding="3" >
					      <tr>
        					<th width="30%">Name:</th>
        					<td width="50%">
        						<input type="text" name="student_name" value="" size="60" />
		        			</td>
					      </tr>
						  <tr>
        					<th>User ID:</th>
        					<td>
        						<input type="text" name="student_id" value="" size="20" />
		        			</td>
					      </tr>
			    		  <tr>
		        			<th>Password:</th>
		        			<td>
   	    						<input type="password" name="password" value="" size="20" />
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
