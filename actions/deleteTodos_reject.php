<?php

include '../settings/connection.php';

global $query;
global $connection;

// Variable to store the number of deletions
$numDeletions = 0;

if(isset($_GET['todo_id'])){
    $todoId = $_GET['todo_id'];
    $query = "DELETE FROM todos WHERE todo_id = $todoId";
    $todoNameQuery = "SELECT task FROM todos WHERE todo_id = $todoId";

    // check if the query was successful
    if($result = $connection->query($todoNameQuery)){
        // Check if any rows were returned
        if($result->num_rows > 0) {
            // Fetch the result row
            $row = $result->fetch_assoc();
            // Get the name of the todo from the fetched row
            $t_name = $row['task'];
            
            // Execute the query to delete the todo
            if($connection->query($query)) {
                // Update status to "cancelled"
                $updateQuery = "UPDATE todos SET todo_status = 'cancelled' WHERE todo_id = $todoId";
                if($connection->query($updateQuery)) {
                    // Increment the number of deletions
                    $numDeletions++;
                    // Prompt the user with an alert
                    echo '<script> alert(" '.$t_name.' Deleted !");</script>';
                    '<script>alert ("Number of deleted todo tasks: " . $numDeletions);</script>';

                    echo '<script> window.location.href ="../index.php";</script>';
                } else {
                    // If update query fails
                    echo "Error updating todo status: " . $connection->error;
                }
            } else {
                // If deletion query fails
                echo "Error deleting todo: " . $connection->error;
            }
        } else {
            // If no rows were returned
            echo "Error: Todo with ID $todoId not found";
        }
    } else {
        // If query to fetch todo name fails
        echo "Error fetching todo name: " . $connection->error;
    }
} else{
    echo 'why';
    //sql error message from connection
    echo $connection->error;
    //it is over
    exit();
}

'<script>console.log("Number of deleted todo tasks: " . $numDeletions);</script>';

echo "Number of deletions: $numDeletions";


?>




