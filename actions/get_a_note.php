<?php

include './settings/connection.php';

function getTodo($id){
    global $connection;
    $query = "SELECT * FROM notes WHERE note_id = $id";
    if($output = $connection->query($query)){
        if($output->num_rows >0) return $output;
    }
    return $output;


}
?>