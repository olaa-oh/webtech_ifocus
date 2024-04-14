<?php
// Database connection
$servername =  "127.0.0.1";
$username = "root";
$password =  "DC55u4B1tg:Z";
$dbname = "ifocusdb";



try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Check if todo_id parameter is set
if (isset($_GET['todo_id'])) {
    // Retrieve todo_id from GET parameters
    $todoId = $_GET['todo_id'];
    try {
        // Prepare SQL query to update todo status to "Cancelled"
        $stmt = $pdo->prepare("UPDATE todos SET todo_status = 'Cancelled' WHERE todo_id = :todo_id AND todo_status = 'Pending'");
        // Bind todo_id parameter
        $stmt->bindParam(':todo_id', $todoId);
        // Execute the query
        $stmt->execute();
        // Check if any rows were affected
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            echo "Todo task with ID $todoId has been successfully cancelled.";
            header("Location: ../view/ifocus.php");
        } else {
            echo "You cannot cancel a completed task.";
        }
    } catch (PDOException $e) {
        // Handle database errors
        // You might want to log the error or display a user-friendly message
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Todo ID parameter is missing.";
}
?>
