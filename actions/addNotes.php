<?php
include '../settings/connection.php';

$form_ouput = $_POST;

// clicked the submit button
if(isset($_POST['saveNote'])){
    $notesTitle = $form_ouput["titleNote"];
    $notesContent = $form_ouput["noteContent"];
}
else{
    echo '<script>alert("Please, try again.");</script>';
    echo '<script>window.location.href="../index.php";</script>';
    exit();
}
$query = "INSERT INTO notes (note_title,note_content) VALUES ('$notesTitle','$notesContent')";

if($connection->query($query)=== TRUE){
    echo '<script> alert("note added!");</script>';}
    else{
        echo'<script> alert(Error! Try again);</script>';
}
echo '<script>window.location.href="../index.php";</script>';
exit();
?>