<?php
include './settings/connection.php';

//a function to get all the chore in the database
function allNotes(){
    $query =   "SELECT * FROM notes ORDER BY created_at DESC";

    global $connection;

    if(!$output = $connection->query($query)){
        echo "Failed";
        exit();
    }
    return $output;
}


?>