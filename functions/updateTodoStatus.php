

<?php


// Database configuration
$dbHost = 'localhost'; // Change this to your database host
$dbName = 'ifocusDB'; // Change this to your database name
$dbUser = 'root'; // Change this to your database username
$dbPassword = ''; // Change this to your database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Set default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    // If connection fails, display error message
    die("Failed to connect to database: " . $e->getMessage());
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the todo_id and completed status from the request
    $todoId = $_POST['todo_id'];
    $completed = $_POST['completed'];

    // Update the todo_status in the database
    $sql = "UPDATE todos SET todo_status = '" . ($completed ? 'Completed' : 'Pending') . "' WHERE todo_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$todoId]);

    // Check if the query was successful
    if ($stmt->rowCount() > 0) {
        // Return success response
        http_response_code(200);
        echo "Todo status updated successfully.";
        exit();
    } else {
        // Return error response
        http_response_code(500);
        echo "Failed to update todo status.";
        exit();
    }
}
?>
