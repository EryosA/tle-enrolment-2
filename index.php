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
        <link rel= "stylesheet" type= "text/css" href= "css/registration.css"/>
        <script language="JavaScript" type= "text/javascript"></script>

        </script>
    </head>

    <body>
        <div id="wrapper">
            <div id="header">

                <img src="images/DepEd-Website-header-110px_1.png"  alt="Department of Education" style="height: 75px;">
                <h1 id="title">TLE Course Selection and Enrolment</h1>

            </div> <!-- id="header" -->
            <div id="hnav">
                <table width="400" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td><a href="index.php">Home</a> </td>
                    <td><a href="Student/studsignin.php">Student</a> </td>
                    <td><a href="Facilitator/facisignin.php">Facilitator</a> </td>
                    <td><a href="AdministratorAuthentication/signin.php">Administrator</a> </td>
                    <td><a href="support.php">Support</a> </td>
                    <td><a href="about.php">About</a></td>
                  </tr>
                </table>

            </div> <!-- id="hnav" -->
            <div id="vnav">
                <table width="120" border="0" cellspacing="2" cellpadding="2">
                    <tr>
                        <td id="vhead">Go To: </td>
                    </tr>
                    <tr>
                        <td><a href="Registration/classes.php">Class List</a> </td>
                    </tr>
                    <!-- <tr>
                        <td><a href="Registration/stuentry.php">Student Entry</a>
                        </td>
                    </tr> -->
                </table>

            </div> <!-- id="vnav" -->
            <div id="main">
                <h1 id="maintitle">Class Schedule</h1>
                <p id="mainpara">Click Class List to Register for a class.</p>
                <p class="red">*A footnote.</p>

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

        <?php
         ;
        ?>
    </body>
</html>
