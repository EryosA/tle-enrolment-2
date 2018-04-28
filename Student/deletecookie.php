<?php
//Delete cookiefor name and date.
$expire = time()-(60*60);
setcookie("Student[name]", $name, $expire, "/");
setcookie("Student[date]", $date, $expire, "/");
$connection = NULL;
$name = NULL;
$userid = NULL;
$userpasswd = NULL;
$_SESSION["errmsg"] = NULL;
?>