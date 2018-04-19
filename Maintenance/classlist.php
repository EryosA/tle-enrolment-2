<?php
require_once "doorway.php" ;

/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*     classlist.php  Display a list of classes that
*     can be updated or deleted. Called by classentry.php
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/

//Connect to the ClassRegistration database
	$connection = mysqli_connect("localhost", "root", "", "classregistration");
	if (!$connection) {
		echo "Cannot connect to MySQL. ", mysqli_connect_error($connection);
		exit();
	}
//Get records from the class table
 	$query = "SELECT * From class ORDER BY class_start";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		echo "Select from class failed. ", mysqli_error($connection);
		exit();
	}
//Get first class (row)from class table
	$classrow = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
   <head>
   		<meta charset="utf-8">
		<title>Class List for Updating & Deleting</title>
		<link rel= "stylesheet" type= "text/css" href= "../css/registration.css"/>
		<script language="JavaScript" type= "text/javascript"></script>
	</head>
	<body>
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
                    <td><a href="AdministratorAuthentication/adminAuthen.php">Maintain</a> </td>
  		    	  </tr>
				</table>

			</div> <!-- id="hnav" -->
			<div id="vnav">
				<table width="100" border="0" cellspacing="2" cellpadding="2">
    				<tr>
				        <td id="vhead">Go To: </td>
				    </tr>
					<tr>
				        <td><a href="classentry.php">Add New Classes</a> </td>
				    </tr>
				    <tr>
				        <td><a href="systementry.php">System Entry</a>
				        </td>
				    </tr>
				</table>

			</div> <!-- id="vnav" -->
			<div id="main">
				<h1 id="maintitle">Class List</h1>
				<p id="mainpara">Choose to Update or Delete a class.</p>

				<!-- Class List -->
				<table width="850" border="1" frame="void" rules="all" cellspacing="1" cellpadding="2">
					<!-- Display the column headings -->
				    <tr>
						<th class="list" width="40">Class ID</th>
				        <th class="list" width="110">Class Title</th>
				        <th class="list" width="60">Class Start</th>
				        <th class="list" width="400">Class Description</th>
						<th class="list" width="50">Class Cost</th>
						<th class="list" width="50">Class Instructor</th>
						<th class="list" width="50">&nbsp</th>
						<th class="list" width="40">&nbsp</th>
				   </tr>

				   <!-- Loop through and display the classes (first class retrieved above). -->
				   <?php do {  ?>

				   <tr>
						<td align="center"><?php echo $classrow ['class_id']; ?></td>
						<td><?php echo $classrow ['class_title']; ?></td>
						<td align="center"><?php echo date('m/d/y',strtotime($classrow ['class_start'])); ?></td>
						<td><?php echo $classrow ['class_descr']; ?> &nbsp </td>
						<td align="right">&#8369; <?php echo number_format($classrow ['class_cost'],0,'.',','); ?>&nbsp</td>
						<td><?php echo $classrow ['class_instr']; ?></td>
						<td><a href="classupdate.php?recordID=<?php echo $classrow ['class_id']; ?>">Update</a></td>
						<td><a href="classdelete.php?recordID=<?php echo $classrow ['class_id']; ?>">Delete</a></td>
				   </tr>
			   	   <?php } while ( $classrow = mysqli_fetch_assoc($result) ); ?>
			</table>

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
