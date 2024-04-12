<?php
session_start();
include '../settings/connection.php';

$form_ouput = $_POST;

// clicked the submit button
if(isset($_POST['saveNote'])){
    $notesTitle = $form_ouput["titleNote"];
    $notesContent = $form_ouput["noteContent"];

    
}
else{
    echo '<script>alert("Please, try again.");</script>';
    echo '<script>window.location.href="../view/ifocus.php";</script>';
    exit();
}
$query = "INSERT INTO notes (note_title,note_content,user_id) VALUES ('$notesTitle','$notesContent','$_SESSION[user_id]')";

if($connection->query($query)=== TRUE){
    echo '<script> alert("note added!");</script>';
} else {
    echo'<script> alert(Error! Try again);</script>';
}
echo '<script>window.location.href="../view/ifocus.php";</script>';
exit();
?>