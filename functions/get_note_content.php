<?php
// Assuming you have a database connection established
$server = "localhost";
$user = "root";
$database = "ifocusDB";
$passwd = "";

$connection = new mysqli($server, $user, $passwd, $database);

// checking conection
if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}

if(isset($_POST['note_id'])){
    // Get note ID from AJAX request
    $noteId = $_POST['note_id'];
    // Query to fetch note content based on note ID
    // $sql = "SELECT note_content FROM notes WHERE note_id = $noteId";
    $sql = "SELECT note_title, note_content FROM notes WHERE note_id = $noteId";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch note content
        $row = mysqli_fetch_assoc($result);
        $noteTitle = $row['note_title'];
        $noteContent = $row['note_content'];
        // Return note content as response
        echo 
        "

        <p class = 'viewTitle'>$noteTitle
        <button  id = 'buttonClose  onclick ='closeNoteContent()'><img src='../assets/close.png' alt='close' title = 'close note' style = 'width:12px;cursor:pointer;'></button>
        <button class='edit'><img src='../assets/pencil.png' alt='edit task' class ='deleteB' ></button>

        </p>";
        echo "<p class = 'viewContent' contenteditable = 'true'>$noteContent</p>";

        // echo $noteContent;
    } else {
        echo "Note not found.";
    }

    // Close database connection
    mysqli_close($connection);
}
?>
