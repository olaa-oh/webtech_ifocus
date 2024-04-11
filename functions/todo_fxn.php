<?php
include './actions/getAllTodo.php';

$all_data = allTodos();
$pending_data = getPendingTasks();
$completed_data = getCompletedTasks();
$cancelled_data = getCancelledTasks();


$data = '';

while($row = $all_data->fetch_assoc()){
    $todoId = $row['todo_id'];
    $data .= '
<ul class = listContainer id="taskList">
    <li >
    <div class = "stats">
        <div class = "todoLines">
            <input type="checkbox" data-todo-id='.$todoId.' name = "checkbox" id = "1"  onchange="updateTaskStatus(this)" onclick="updateTaskStatus1(this)">
            <span contenteditable = "true">'.$row["task"].'</span>
        </div>
        <button title ="delete task"  class = "deleteTask">
        <a href = "./actions/deleteTodo.php?todo_id='.$todoId.'">
            <img src="assets/close.png" alt="delete task" class ="deleteB" ></a>
        </button>
    </div>
    </li>
</ul>



    	';
}

$pdata = '';

while($row = $pending_data->fetch_assoc()){
    $todoId = $row['todo_id'];
    $pdata .= '
<ul class = listContainer id="taskList">
    <li >
    <div class = "stats">
        <div class = "todoLines">
            <input type="checkbox" data-todo-id='.$todoId.' name = "checkbox" id = "1"  onchange="updateTaskStatus(this)" class="taskCheckbox">
            <span contenteditable = "true">'.$row["task"].'</span>
        </div>
        <button title ="delete task"  class = "deleteTask">
        <a href = "./actions/deleteTodo.php?todo_id='.$todoId.'">
            <img src="assets/close.png" alt="delete task" class ="deleteB" ></a>
        </button>
    </div>
    </li>
</ul>    	';
}


$cdata = '';

while($row = $completed_data->fetch_assoc()){
    $todoId = $row['todo_id'];
    $cdata .= '

    <ul class = listContainer id="taskList">
    <li >
    <div class = "stats">
        <div class = "todoLines1">
            <span contenteditable = "true">'.$row["task"].'</span>
        </div>
        <button title ="delete task"  class = "deleteTask">
        <a href = "./actions/deleteTodo.php?todo_id='.$todoId.'">
            <img src="assets/close.png" alt="delete task" class ="deleteB" ></a>
        </button>
    
    </div>
    </li>
</ul>    	';






}





?>