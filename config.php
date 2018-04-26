<?php

    $databaseHost = 'localhost';
    $databaseName = 'id5406048_classregistration';
    $databaseUsername = 'root';
    $databasePassword = 'root';
    
    //$connection = mysqli_connect("localhost", "root", "", "classregistration");
    $connection = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
 
?>
