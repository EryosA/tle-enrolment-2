<?php
	session_start();


//Connect to the classregistration database
	require_once("../config.php");
	if (!$connection) {
		echo "Cannot connect to MySQL. ", mysqli_connect_error($connection);
		exit();
	}

	//Get email address from studsignin.php
    // 	$studentid = ($_GET['student_id']);

	//Get user id when student logs in
    $studentid = ($_SERVER['USER']);

//Get records from the registration table
    $query = "SELECT * FROM `student` WHERE `student_id` = '$studentid'";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Select from registration failed. ", mysqli_error($connection);
		exit();
	}
//Get student (row) from student table
	$studentrow = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
   <head>
   		<meta charset="utf-8">
		<title>Student Profile Page</title>
		<link rel= "stylesheet" type= "text/css" href= "../css/registration.css"/>
		<script language="JavaScript" type= "text/javascript"></script>
	</head>
	<!-- Put cursor in the first field
	<body onload="document.form1.confirm.focus();"> -->
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
				<h1 id="maintitle">Student Profile</h1>
				<br />


				<table width="850" border="1" frame="void" rules="all" cellspacing="1" cellpadding="2">
					<!-- Display the column headings -->
				    <tr>
				        <th class="list" width="100">Student ID</th>
				    	<th class="list" width="150">Name</th>
				        <th class="list" width="200">Email</th>
						<th class="list" width="150">Phone</th>
				        <th class="list" width="300">Registration Date</th>
				   </tr>

				   <!-- Display student info. -->
				   <tr>
						<td><?php echo $studentrow ['student_id']; ?></td>
						<td><?php echo $studentrow ['student_name']; ?></td>
						<td><?php echo $studentrow ['student_email']; ?></td>
						<td><?php echo $studentrow ['student_phone']; ?></td>
						<td><?php echo $studentrow ['student_date']; ?> &nbsp</td>
				   </tr>
				</table>
				   <!-- End student info. -->

<!-- 				Logout user -->
				 <div>
				<br>
				<br>
				 <a href="studlogout.php">Logout</a>
				 </div>



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
