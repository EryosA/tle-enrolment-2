<?php

    $databaseHost = 'localhost';
    $databaseName = 'classregistration';
    $databaseUsername = 'root';
    $databasePassword = '';
    
    //$connection = mysqli_connect("localhost", "root", "", "classregistration");
    $connection = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
 
?>
