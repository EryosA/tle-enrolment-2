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
                        <td><a href="Registration/classes.php">Enroll</a> </td>
                    </tr>
                </table>

            </div> <!-- id="vnav" -->
            <div id="main">
                <h1 id="maintitle">Abstract</h1>
                
                <p id="mainpara">The project was developed for Dr. Maria D. Pastrana National High School to address the
problem of course selection with the incoming Grade 9 students. The aim of the application is to
effectively manage and control the Grade 9 enrolees including an online monitoring in the number of
students enrolled per course. By real time monitoring of the number of students per course, the issue
on unbalanced enrolees per course can be solved.</p><br>

<p id="mainpara">With the Online Enrolment System, the Admin User can disable the courses that meet the
specified number of enrolees. Aside from this function, the application has a record of the student's
summative exam results. This can be a reference point to recommend the course per student based
on the highest score among the four offered courses in Grade 9.</p><br>

<p id="mainpara">One of the benefits of the application is the function to shift the manual enrolment process to
an online enrolment system including a database that will contain the enrolment records. This
approach will eliminate manual allocation of faculty members during the enrolment season, Through
the project, it can then be expanded by the school administration to cover all grade levels across the
school. Not only it is supporting the modern technology of an online system, it will also migrate the
student's records from local to an online directory that can be made available to the parents, faculty
and school management.</p><br>

<p id="mainpara">This application can be a start of a new enrolment system in Dr. Maria D. Pastrana High
School.</p><br>

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
