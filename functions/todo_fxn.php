<?php
include '../actions/getAllTodo.php';


// Fetch all tasks from the database
$pending_data = filterTasksByStatus('Pending');
$completed_data = filterTasksByStatus('Completed');
$cancelled_data = filterTasksByStatus('Cancelled');


// PENDING TASKS
$penData = '';

if ($pending_data->num_rows > 0) {
    while ($row = $pending_data->fetch_assoc()) {
        $todoId = $row['todo_id'];
        $penData .= '
            <ul class = listContainer id="taskList">
                <li>
                    <div class = "stats">
                        <div class = "todoLines">
                            <input type="checkbox" data-todo-id='.$todoId.' name = "checkbox" id = "1"  onchange="updateTaskStatus(this)" onclick="updateTaskStatus1(this)">
                            <span contenteditable = "true">' . $row["task"] . '</span>
                        </div>
                        <button title ="delete task"  class = "deleteTask">
                            <a href = "../actions/deleteTodo.php?todo_id=' . $todoId . '">
                                <img src="../assets/close.png" alt="delete task" class ="deleteB" >
                            </a>
                        </button>
                    </div>
                </li>
            </ul>    	
        ';
    }
} else {
    $penData = '<tr class="empty-data"><td>You do not have any pending task!</td></tr>';
}


// COMPLETED TASKS
$comData = '';

if ($completed_data->num_rows > 0) {
    while ($row = $completed_data->fetch_assoc()) {
        $todoId = $row['todo_id'];
        $comData .= '
            <ul class = listContainer id="taskList">
                <li>
                    <div class = "stats">
                        <div class = "todoLines1">
                            <span contenteditable = "true">' . $row["task"] . '</span>
                        </div>
                        <button title ="delete task"  class = "deleteTask">
                        <a href = "../actions/deleteTodo.php?todo_id=' . $todoId . '">
                            <img src="../assets/close.png" alt="delete task" class ="deleteB" ></a>
                        </button>
                    </div>
                </li>
            </ul>    	
        ';
    }
} else {
    $comData = '<tr class="empty-data"><td>You have not completed any task yet!</td></tr>';
}


// CANCELLED TASKS
$canData = '';

if ($cancelled_data->num_rows > 0) {
    while ($row = $cancelled_data->fetch_assoc()) {
        $todoId = $row['todo_id'];
        $canData .= '
            <ul class = listContainer id="taskList">
                <li>
                    <div class = "stats">
                        <div class = "todoLines2">
                            <span contenteditable = "true">' . $row["task"] . '</span>
                        </div>
                        <button title ="delete task"  class = "deleteTask">
                        <a href = "../actions/deleteTodo.php?todo_id=' . $todoId . '">
                            <img src="../assets/close.png" alt="delete task" class ="deleteB" ></a>
                        </button>
                    </div>
                </li>
            </ul>    	
        ';
    }
} else {
    $canData = '<tr class="empty-data"><td>You have not cancelled any task yet!</td></tr>';
}


// CATEGORY COUNT
$pendingCount = $pending_data->num_rows;
$completedCount = $completed_data->num_rows;
$cancelledCount = $cancelled_data->num_rows;
?>