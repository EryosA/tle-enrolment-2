<?php
require_once "doorway.php" ;

/*******************************************************
*
*      CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*        classdelete.php  Delete selected class.
*    Called by classlist.php and calls updateclass.php
*
********************************************************
*CAUTION, USE AT YOUR OWN RISK, NO WARRANTY OF ANY KIND
********************************************************/

//Get Class ID from classlist.php
	$classid = ($_GET['recordID']);

//Connect to the ClassRegistration database
	$connection = mysqli_connect("localhost", "root", "", "classregistration");
	if (!$connection) {
		echo "Cannot connect to MySQL. ", mysqli_connect_error($connection);
		exit();
	}

//Get records from the class table
 	$query = "SELECT * From class WHERE class_id = $classid";
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
		<title>Class Delete</title>
		<link rel= "stylesheet" type= "text/css" href= "/ClassRegistration/registration.css"/>
		<script language="JavaScript" type= "text/javascript"></script>
	</head>
	<body >
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
				        <td><a href="classlist.php">Return to Class List</a>
				        </td>
				    </tr>
				</table>

			</div> <!-- id="vnav" -->
			<div id="main">
				<h1 id="maintitle">Class Delete</h1>
				<p class="red"><b>If you are sure you want to delete this class, click Delete.</b></p>

				<!-- Class Entry form -->
				<form action="deleteclass.php?recordID=<?php echo $classrow ['class_id']; ?>" method="post" name="form1">
					<table width="600px" border="0" cellspacing="1" cellpadding="3">
						<tr>
						   <th width="18%">Class ID:</th>
					       <td width="60%"><?php echo $classrow ['class_id']; ?></td>
						</tr>
 					   	<tr>
						   <th>Class Title:</th>
					       <td><?php echo $classrow ['class_title']; ?></td>
						</tr>
					    <tr>
					        <th>Class Start Date:</th>
					        <td><?php echo date('m/d/y',strtotime($classrow ['class_start'])); ?></td>
					    </tr>
					    <tr>
					        <th>Class Description:</th>
					        <td><?php echo $classrow ['class_descr']; ?></td>
					    </tr>
					    <tr>
					        <th>Class Cost:</th>
					        <td>$<?php echo number_format($classrow ['class_cost'],0,'.',','); ?>&nbsp</td>
					    </tr>
					    <tr>
						    <th>Class Instructor:</th>
						    <td><?php echo $classrow ['class_instr']; ?></td>
					    </tr>
					</table>
					<p class="red"><input type="submit" value="Delete" /></p>
				</form>

				<p class="red">&nbsp</p>

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
