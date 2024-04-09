<?php

//creating connection
$server = "localhost";
$user = "root";
$database = "ifocusDB";
$passwd = "";

$connection = new mysqli($server, $user, $passwd, $database);

// checking conection
if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}












?>