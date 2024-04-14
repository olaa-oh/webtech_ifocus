<?php
session_start();


if(($_POST) >0) {

    $text = $_POST['text'];

    // connect to the database

    $string = "mysql:host=127.0.0.1;dbname=ifocusdb";

    try {
        $connection = new PDO($string, 'root', 'DC55u4B1tg:Z');
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }

    // read database
    $text = addslashes($text);
    $stmt = $connection->query("SELECT * FROM notes WHERE note_title LIKE '%$text%' AND user_id = $_SESSION[user_id]");

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);




}





?>



