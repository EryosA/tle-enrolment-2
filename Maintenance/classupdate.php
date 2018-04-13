<?php
require_once "doorway.php" ;

/*******************************************************
*
*     CLASS SELECTION AND REGISTRATION SYSTEM
*       from PHP and MySQL, A Beginner's Guide
*     by Marty Matthews, published 2014 McGraw-Hill
*
*       classupdate.php  Update selected class.
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
		<title>Class Database Update</title>
		<link rel= "stylesheet" type= "text/css" href= "/ClassRegistration/registration.css"/>
		<script language="JavaScript" type= "text/javascript"></script>
	</head>
	<!-- Put cursor in the first field -->
	<body onLoad="document.form1.class_title.focus();">
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
				<h1 id="maintitle">Class Database Update</h1>
<?php
		if($_SESSION["errmsg"] < 1 ){
?>
		<p id="mainpara">Please make the desired changes and click Update.</p>
<?php
	}
	elseif ($_SESSION["errmsg"] == 1) {
?>
		<p class="red">A Class Title is required.</p>
		<p class="red">Please RE-make the desired changes and click Update.</p>
<?php
		$_SESSION["errmsg"] = NULL;
	}
	elseif ($_SESSION["errmsg"] == 2) {
?>
		<p class="red">A Start Date is required.</p>
		<p class="red">Please RE-make the desired changes and click Update.</p>
<?php
		$_SESSION["errmsg"] = NULL;
	}
	elseif ($_SESSION["errmsg"] == 3) {
?>
		<p class="red">A Class Descriptioon is required.</p>
		<p class="red">Please RE-make the desired changes and click Update.</p>
<?php
		$_SESSION["errmsg"] = NULL;
	}
	elseif ($_SESSION["errmsg"] == 4) {
?>
		<p class="red">A Class Cost is required.</p>
		<p class="red">Please RE-make the desired changes and click Update.</p>
<?php
		$_SESSION["errmsg"] = NULL;
	}
	elseif ($_SESSION["errmsg"] == 5) {
?>
		<p class="red">An Instructor is required.</p>
		<p class="red">Please RE-make the desired changes and click Update.</p>
<?php
		$_SESSION["errmsg"] = NULL;
	}
	else  {
?>
		<p class="red"> &nbsp </p>
		<p class="red">Please RE-make the desired changes and click Update.</p>
<?php
	}
?>
				<!-- Class Entry form -->
				<form action="updateclass.php?recordID=<?php echo $classrow ['class_id']; ?>" method="post" name="form1">
					<table width="600px" border="0" cellspacing="1" cellpadding="3">
						<tr>
						   <th width="18%">Class ID:</th>
					       <td width="60%"><?php echo $classrow ['class_id']; ?></td>
						</tr>
 					   	<tr>
						   <th>Class Title:</th>
					       <td>
        						<input type="text" name="class_title" value="<?php echo $classrow ['class_title']; ?>" size="60" />
					       </td>
						</tr>
					    <tr>
					        <th>Class Start Date:<span class="red">*</span></th>
					        <td>
        						<input type="text" name="class_start" value="<?php echo $classrow ['class_start']; ?>" size="60" />
					        </td>
					    </tr>
					    <tr>
					        <th>Class Description:</th>
					        <td>
        						<textarea name="class_descr" cols="60" rows="4"><?php echo $classrow ['class_descr']; ?></textarea>
					        </td>
					    </tr>
					    <tr>
					        <th>Class Cost:</th>
					        <td>
        						<input type="text" name="class_cost" value="<?php echo $classrow ['class_cost']; ?>&nbsp" size="20" />
					        </td>
					    </tr>
					    <tr>
						    <th>Class Instructor:</th>
						    <td>
        						<input type="text" name="class_instr" value="<?php echo $classrow ['class_instr']; ?>" size="20" />
					        </td>
					    </tr>
					</table>
					<p><input type="submit" value="Udate" /></p>
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
