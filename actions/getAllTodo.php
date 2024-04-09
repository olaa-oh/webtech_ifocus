<?php
include './settings/connection.php';

//a function to get all the chore in the database
function allTodos(){
    $query =   "SELECT * FROM todos ORDER BY created_at DESC";

    global $connection;

    if(!$output = $connection->query($query)){
        echo "Failed";
        exit();
    }
    return $output;
}


?>