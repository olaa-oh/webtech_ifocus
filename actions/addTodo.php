<?php
include '../settings/connection.php';

$form_ouput = $_POST;

// clicked the submit button
if(isset($_POST['addBtn'])){
    $taskName = $form_ouput["todo"];
}
else{
    echo '<script>alert("Please, try again.");</script>';
    echo '<script>window.location.href="../index.php";</script>';
    exit();
}
$query = "INSERT INTO todos(task) VALUES ('$taskName')";

if($connection->query($query)=== TRUE){
    echo '<script> alert("todo added!");</script>';}
    else{
        echo'<script> alert(Error! Try again);</script>';
}
echo '<script>window.location.href="../index.php";</script>';
exit();
?>