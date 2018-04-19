<?php
require_once "../Maintenance/doorway.php" ;

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
		<title>Student Grade Table</title>
		<link rel= "stylesheet" type= "text/css" href= "../css/registration.css"/>
		<script language="JavaScript" type= "text/javascript"></script>
	</head>
	<!-- Put cursor in the first field -->
	<body onload="document.form1.class_title.focus();">
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
                    <!-- <td><a href="facisignin.php">Facilitator</a> </td>
                    <td><a href="../AdministratorAuthentication/adminAuthen.php">Maintain</a> </td> -->
  		    	  </tr>
				</table>
			</div> <!-- id="hnav" -->
			<div id="vnav">
				<table width="120" border="0" cellspacing="2" cellpadding="2">
    				<tr>
				        <td id="vhead">Go To: </td>
				    </tr>
            <tr>
				        <td><a href="../Facilitator/facigradesheet.php">Enter Student Grades</a>
				        </td>
				    </tr>
				</table>

			</div> <!-- id="vnav" -->
			<div id="main">
				<h1 id="maintitle">Student Grade Database Entry</h1>
<?php
		if($_SESSION["errmsg"] < 1 ){
?>
		<p id="mainpara">Please enter student name, grade and click Submit.</p>
<?php
	}
	elseif ($_SESSION["errmsg"] == 1) {
?>
		<p class="red">A Student Name is required.</p>
		<p class="red">Please RE-enter Student Name and click Submit.</p>

<?php
	}
?>

				<!-- Class Entry form -->
				<form action="faciaddgrades.php" method="post" name="form1">
					<table width="600px" border="0" cellspacing="1" cellpadding="3">
 					   	<tr>
						   <th width="18%">Student Name:</th>
					       <td width="60%">
        						<input type="text" name="student_name" value="" size="60" />
					       </td>
						</tr>
            <tr>
             <th width="18%">Dressmaking</th>
               <td width="30%">
                  <input type="text" name="dressmaking" value="" size="10" />                            
               </td>
          </tr>
          <tr>
           <th width="18%">Cookery</th>
             <td width="30%">
                <input type="text" name="cookery" value="" size="10" />

             </td>
        </tr>
        <tr>
         <th width="18%">Handicraft</th>
           <td width="30%">
              <input type="text" name="handycraft" value="" size="10" />
           </td>
      </tr>
      <tr>
       <th width="18%">Electrical</th>
         <td width="30%">
            <input type="text" name="electrical" value="" size="10" />
         </td>
    </tr>
    <tr>
     <th width="18%">Electronics</th>
       <td width="30%">
          <input type="text" name="electronics" value="" size="10" />
       </td>
  </tr>
  <tr>
   <th width="18%">Drafting</th>
     <td width="30%">
        <input type="text" name="drafting" value="" size="10" />
     </td>
</tr>
<tr>
 <th width="18%">Computer Hardware & Servicing</th>
   <td width="30%">
      <input type="text" name="chs" value="" size="10" />
   </td>
</tr>
<tr>
 <th width="18%">Beauty Care</th>
   <td width="30%">
      <input type="text" name="beauty_care" value="" size="10" />
   </td>
</tr>
<tr>
 <th width="18%">Welding</th>
   <td width="30%">
      <input type="text" name="welding" value="" size="10" />
   </td>
</tr>



					</table>
					<p><input type="submit" value="Submit" /></p>
				</form>

				<p class="red">Student Name field is required.<br /></p>
        <p class="red">Student Name format is First Name Last Name. (ex. Juan Santos)<br /></p>


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
