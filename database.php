<?php
////////////////
//QUESTION 1.1//
////////////////
    $dsn = 'mysql:host=localhost;dbname=classicmodels';//database name is ClassicModels
    $username = 'user';//choose your own username
    $password = 'password';//choose your own password

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../database_error.php'); //all files are in the project root access them directly
        exit();                          //change this -> "../errors/database_error.php" to this -> "database_error.php"          
    }
?>