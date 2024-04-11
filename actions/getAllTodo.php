<?php
include './settings/connection.php';

// Function to get all todos from the database
function allTodos(){
    global $connection;
    $query = "SELECT * FROM todos ORDER BY created_at DESC";
    if(!$output = $connection->query($query)){
        echo "Failed";
        exit();
    }
    return $output;
}

// Function to get pending tasks
function getPendingTasks() {
    global $connection;
    $query = "SELECT * FROM todos WHERE todo_status = 'Pending'";
    if(!$output = $connection->query($query)){
        echo "Failed";
        exit();
    }
    return $output;
}

// Function to get completed tasks
function getCompletedTasks() {
    global $connection;
    $query = "SELECT * FROM todos WHERE todo_status = 'Completed'";
    if(!$output = $connection->query($query)){
        echo "Failed";
        exit();
    }
    return $output;
}

// Function to get cancelled tasks
function getCancelledTasks() {
    global $connection;
    $query = "SELECT * FROM todos WHERE todo_status = 'Cancelled'";
    if(!$output = $connection->query($query)){
        echo "Failed";
        exit();
    }
    return $output;
}
?>
