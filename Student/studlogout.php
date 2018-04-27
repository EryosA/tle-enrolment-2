<?php
session_start();
session_destroy();
header('Location: studsignin.php');
exit;
?>
