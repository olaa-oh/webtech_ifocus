<?php

// include '../settings/connection.php';



if(($_POST) >0) {

    $text = $_POST['text'];

    // connect to the database

    $string = "mysql:host=localhost;dbname=ifocusDB";

try {
    $connection = new PDO($string, 'root', '');
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// read database
$text = addslashes($text);
$stmt = $connection->query("SELECT * FROM notes WHERE note_title LIKE '%$text%'");

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);




}

?>



