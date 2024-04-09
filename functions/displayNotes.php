<?php

include './settings/connection.php';

function connectToDatabase() {
    global $server, $user, $passwd, $database;
    $connection = new mysqli($server, $user, $passwd, $database);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    return $connection;
}

// Function to get the number of todos for 'Pending' status
function getPendingTodoCount() {
    $connection = connectToDatabase();
    $status = 'Pending';
    $sql = "SELECT COUNT(*) AS count FROM todos WHERE todo_status = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc()['count'];
    $stmt->close();
    $connection->close();
    return $count;
}

// Function to get the number of todos for 'Completed' status
function getCompletedTodoCount() {
    $connection = connectToDatabase();
    $status = 'Completed';
    $sql = "SELECT COUNT(*) AS count FROM todos WHERE todo_status = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc()['count'];
    $stmt->close();
    $connection->close();
    return $count;
}

// Function to get the number of todos for 'Cancelled' status
function getCancelledTodoCount() {
    $connection = connectToDatabase();
    $status = 'Cancelled';
    $sql = "SELECT COUNT(*) AS count FROM todos WHERE todo_status = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc()['count'];
    $stmt->close();
    $connection->close();
    return $count;
}

// Example usage
$pendingCount = getPendingTodoCount();
$completedCount = getCompletedTodoCount();
$cancelledCount = getCancelledTodoCount();

// echo "Pending Todo Count: $pendingCount<br>";
// echo "Completed Todo Count: $completedCount<br>";
// echo "Cancelled Todo Count: $cancelledCount<br>";

?>

