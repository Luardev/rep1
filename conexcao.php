<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'Projetinho';
    $con = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    if ($con->connect_error){
        die("Conexção falhou" . $con->connect_error);
    }
?>