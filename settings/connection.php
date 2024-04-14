<?php

//creating connection
$server = "127.0.0.1";
$user = "root";
$database = "ifocusdb";
$passwd = "DC55u4B1tg:Z";

$connection = new mysqli($server, $user, $passwd, $database);

// checking conection
if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}












?>