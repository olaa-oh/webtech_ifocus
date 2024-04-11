<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ifocusDB";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Function to count the number of deleted todo tasks
function markTaskAsDeleted($pdo, $todoId) {
    try {
        // Prepare SQL query to update todo status to "Cancelled"
        $stmt = $pdo->prepare("UPDATE todos SET todo_status = 'Cancelled' WHERE todo_id = :todo_id");
        // Bind todo_id parameter
        $stmt->bindParam(':todo_id', $todoId);
        // Execute the query
        $stmt->execute();
        // Check if any rows were affected
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return true; // Task marked as deleted successfully
        } else {
            return false; // Task not found or already marked as deleted
        }
    } catch (PDOException $e) {
        // Handle database errors
        // You might want to log the error or display a user-friendly message
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>
