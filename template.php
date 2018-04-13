<?php
     session_start();
/*********************************************************************************
*
*     TECHNOLOGY AND LIVELIHOOD EDUCATION (TLE) Enrolment Portal
*
**********************************************************************************
*  CMSC 208 Group 7 : Armechelyn Derecho, Joel Aguirre, Nixon Garais, Joel Tapiru
**********************************************************************************/
?>
<!DOCTYPE html>
<html>
   <head>
   		<meta charset="utf-8">
		<title>TLE Course Registration Portal</title>
		<link rel= "stylesheet" type= "text/css" href= "/ClassRegistration/registration.css"/>
		<script language="JavaScript" type= "text/javascript"></script>
	</head>

	<body>
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
				        <td><a href="classlist.php">Class List</a> </td>
				    </tr>
				    <tr>
				        <td><a href="nameentry.php">Student Entry</a>
				        </td>
				    </tr>
				</table>

			</div> <!-- id="vnav" -->
			<div id="main">
				<h1 id="maintitle">Spring Class Schedule</h1>
				<p id="mainpara">Click Register to do so for a class.</p>
				<p class="red">*A footnote.</p>

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

		<?php
		 ;
		?>
	</body>
</html>
