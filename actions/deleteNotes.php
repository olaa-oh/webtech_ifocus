<?php

include '../settings/connection.php';

global $query;
global $connection;

if(isset($_GET['note_id'])){
    $noteId = $_GET['note_id'];
    $query = "DELETE FROM notes WHERE note_id = $noteId";
    $noteName = "SELECT note_title FROM notes WHERE note_id = $noteId";

    // check if the query was successful
    if($connection->query($noteName)){
        // store the results
        $output = $connection->query($noteName);
        // the rows with the output(result)
        $row  =$output->fetch_assoc();
        // get the name of the note form the name
        $t_name = $row['note_title'];
        //this deletes the note
        $connection->query($query);
        //prompting the user with alerts
        echo '<script> alert(" '.$t_name.' Deleted !");</script>';
        echo '<script> window.location.href ="../view/ifocus.php";</script>';
        header('Location: ../view/ifocus.php');
        exit();


    }

} else{
    // echo 'why';
    //sql error message from connection
    echo $connection->error;
    //it is over
    exit();
}

?>

