<?php
include './actions/getAllTodo.php';

$c_data = allTodos();

$data = '';

while($row = $c_data->fetch_assoc()){
    $todoId = $row['todo_id'];
    $data .= '
<ul class = listContainer>
    <li>
    <div class = "stats">
        <div class = "todoLines">
            <input type="checkbox" name = "tasks" id = "1">
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

?>