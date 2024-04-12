<?php
include '../settings/connection.php';

// Function to get all todos from the database
function allTodos() {
    $query = "SELECT * FROM todos WHERE user_id = ? ORDER BY created_at DESC";
    global $connection;
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}

// Function to get pending tasks
function filterTasksByStatus($status) {
    $query = "SELECT * FROM todos WHERE user_id = ? AND todo_status = ?";

    global $connection;
    $stmt = $connection->prepare($query);
    $stmt->bind_param("is", $_SESSION['user_id'], $status);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}