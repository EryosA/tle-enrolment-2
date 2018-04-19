<?php
/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*     confirm.php  Confirm registration and send email.
*     Called by updatestu.php or enterstu.php
*     Calls sendemail.php
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
//Get Class ID from checkemail.php
	$classid = ($_GET['classid']);

//Get email address from checkemail.php
	$email = ($_GET['email']);

///Get record from the class table
 	$query = "SELECT * From class WHERE class_id = $classid";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Select from class failed. ", mysqli_error($connection);
		exit();
	}
//Get class (row) from class table
	$classrow = mysqli_fetch_assoc($result);

//Get record from the student table
 	$query = "SELECT * From student WHERE student_email = '$email'";
	$result1 = mysqli_query($connection, $query);
	if (!result1) {
		echo "Select from student failed. ", mysqli_error($connection);
		exit();
	}
//Get student (row) from student table
	$sturow = mysqli_fetch_assoc($result1);
?>
<!DOCTYPE html>
<html>
   <head>
   		<meta charset="utf-8">
		<title>Registration Confirmation</title>
		<link rel= "stylesheet" type= "text/css" href= "../css/registration.css"/>
		<script language="JavaScript" type= "text/javascript"></script>
	</head>

	<!-- Put cursor in the first field -->
	<body onLoad="document.form1.confirm.focus();">
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
				        <td><a href="emailentry.php?recordID=<?php echo $classid; ?>">Email Entry</a> </td>
				    </tr>
				</table>

			</div> <!-- id="vnav" -->
			<!-- END Pure Template -->
			<div id="main">
				<h1 id="maintitle">Registration Confirmation</h1>
				<br />
				<p id="mainpara">To complete registration, please review the class and student information.<br />
					If OK, click Confirm, otherwise use one of the options on the left.<br />
					You will be sent an an email confirmaiton.</p>

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
						<td align="right">&#8369;<?php echo number_format($classrow ['class_cost'],0,'.',','); ?>&nbsp</td>
						<td><?php echo $classrow ['class_instr']; ?></td>
				   </tr>
			</table>
			<p>&nbsp</p> <!-- Inserts two blank lines -->
			<p>&nbsp</p>

				<div id="form">
						<!-- Go to enterstu.php after clicking Continue -->
						<form action="sendemail.php?classid=<?php echo $classid ?>&email=<?php echo $email ?>"
							 method="post" name="form1">
	   					<table width="300" border="0" cellspacing="1" cellpadding="3" >
					<!-- Display the column headings -->
				    <tr>
						<th class="list" width="40">Email Address</th>
				        <th class="list" width="150">Student Name</th>
				        <th class="list" width="60">Phone Number</th>
				        <th class="list" width="450">Registration Date</th>
				   </tr>

				   <!-- Display the selected class. -->
				   <tr>
						<td align="center"><?php echo $sturow ['student_email']; ?></td>
						<td><?php echo $sturow ['student_name']; ?></td>
						<td><?php echo $sturow ['student_phone']; ?> &nbsp </td>
						<td align="center"><?php echo date('m/d/y',strtotime($sturow ['student_date'])); ?></td>
				   </tr>
  					  </table>
						 <br />
						 <input type="submit" name="confirm" value="Confirm" />
					</form>
				</div> <!-- id=form -->
				<!-- End Student Entry -->
				<!-- Begin from template -->
				<br />
				<p class="red">&nbsp</p>
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
