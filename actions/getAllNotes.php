<?php


include '../settings/connection.php';

//a function to get all the chore in the database
function allNotes(){
    global $connection;
       // Ensure user_id is properly sanitized and escaped
       $user_id = $connection->real_escape_string($_SESSION['user_id']);

       // Query to select all notes for the current user
       $query = "SELECT * FROM notes WHERE user_id = '$user_id' ORDER BY created_at DESC";
        // echo $_SESSION['user_id'];


    if(!$output = $connection->query($query)){
        echo "Failed";
        exit();
    }
    return $output;
}


?>