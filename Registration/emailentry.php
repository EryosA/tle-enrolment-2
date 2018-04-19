<?php

/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*     emailentry.php  Enter email to see if on file.
*     Called by classes.php and calls checkmail.php
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/

//Get Class ID from classes.php
	$classid = ($_GET['recordID']);

//Connect to the ClassRegistration database
	//$connection = mysqli_connect("localhost", "root", "", "classregistration");
	require_once("../config.php");
	if (!$connection) {
		echo "Cannot connect to MySQL. ", mysqli_connect_error($connection);
		exit();
	}

//Get records from the class table
 	$query = "SELECT * FROM class WHERE class_id = $classid";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Select from class failed. ", mysqli_error($connection);
		exit();
	}

//Get class (row)from database
	$classrow = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
   <head>
   		<meta charset="utf-8">
		<title>Email Entry for Registration</title>
		<link rel= "stylesheet" type= "text/css" href= "../css/registration.css"/>
		<script language="JavaScript" type= "text/javascript" src="emailvalid.js"></script>
	</head>
	<!-- Put cursor in the first field -->
	<body onLoad="document.form1.email.focus();">
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
                    <td><a href="../AdministratorAuthentication/adminAuthen.php">Maintain</a> </td>
  		    	  </tr>
				</table>

			</div> <!-- id="hnav" -->
			<div id="vnav">
				<!-- Placeholder only -->
				<table width="120" border="0" cellspacing="2" cellpadding="2">
    				<tr>
				        <td id="vhead">Go To:</td>
				    </tr>
					<tr>
				        <td><a href="classes.php">Class List</a> </td>
				    </tr>
				    <tr>
				        <td>&nbsp</td>
				    </tr>
				</table>

			</div> <!-- id="vnav" -->
			<!-- END Pure Template -->

			<div id="main">
				<h1 id="maintitle">Student Registration</h1>
				<p id="mainpara">To register for this class, please enter your email address twice
					and click Continue.</p>

				<!-- From Class List -->
				<table width="850" border="1" frame="void" rules="all" cellspacing="1" cellpadding="2">
					<!-- Display the column headings -->
				    <tr>
						<th class="list" width="40">Class ID</th>
				        <th class="list" width="150">Class Title</th>
				        <th class="list" width="60">Class Start</th>
				        <th class="list" width="450">Class Description</th>
						<th class="list" width="50">Class Cost</th>
						<th class="list" width="50">Class Instructor</th>
				   </tr>

				   <!-- Display the selected class. -->
				   <tr>
						<td align="center"><?php echo $classrow ['class_id']; ?></td>
						<td><?php echo $classrow ['class_title']; ?></td>
						<td align="center"><?php echo date('m/d/y',strtotime($classrow ['class_start'])); ?></td>
						<td><?php echo $classrow ['class_descr']; ?> &nbsp </td>
						<td align="right">$<?php echo number_format($classrow ['class_cost'],0,'.',','); ?>&nbsp</td>
						<td><?php echo $classrow ['class_instr']; ?></td>
				   </tr>
			</table>
			<p>&nbsp</p> <!-- Inserts two blank lines -->
			<p>&nbsp</p>

			<div id="form">
			<!-- Display the email entry form. After filling in, go to the check email script. -->
			<!-- The onsubmit statement calls the JavaScript validation functions. -->
				<form action="checkemail.php?recordID=<?php echo $classid ?>" method="post"
				 onsubmit="return validate_form(this)" name="form1">
			       <input type="hidden" name="classid" value="<?php echo $classid; ?>"/>
	   				<table width="200" border="0" cellspacing="3" cellpadding="5" >
					    <tr>
        					<th width="100">Email Address:</th>
        					<td width="80">
        						<input type="text" name="email" value="" size="40" />
		        			</td>
					    </tr>
					    <tr>
        					<th width="100">Confirm Email:</th>
        					<td width="80">
        						<input type="text" name="conemail" value="" size="40" />
		        			</td>
					    </tr>
  					</table>
						<input type="submit" name="submit" value="Continue" />
				</form>
			</div>  <!-- id="form" -->

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
