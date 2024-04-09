<?php

// include '../settings/connection.php';

// global $query;
// global $connection;

// if(isset($_GET['todo_id'])){
//     $todoId = $_GET['todo_id'];
//     $query = "DELETE FROM todos WHERE todo_id = $todoId";
//     $todoName = "SELECT task FROM todos WHERE todo_id = $todoId";
//     echo $todoName;
//     echo $todoId;

//     // check if the query was successful
//     if($connection->query($todoName)){
//         // store the results
//         $output = $connection->query($todoName);
//         // the rows with the output(result)
//         $row  =$output->fetch_assoc();
//         // get the name of the todo form the name
//         $t_name = $row['task'];
//         //this deletes the todo
//         $connection->query($query);
//         //prompting the user with alerts
//         echo '<scrpt> alert(" '.$t_name.' Deleted !");</script>';
//         echo '<script> window.location.href ="../index.php";</script>';
//     }
// } else{
//     echo 'why';
//     //sql error message from connection
//     echo $connection->error;
//     //it is over
//     exit();
// }




include '../settings/connection.php';

global $query;
global $connection;

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
                // Prompt the user with an alert
                echo '<script> alert(" '.$t_name.' Deleted !");</script>';
                echo '<script> window.location.href ="../index.php";</script>';
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

?>




