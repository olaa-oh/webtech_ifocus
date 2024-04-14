<!-- 
include '../actions/getAllNotes.php';

$c_data = allNotes();

$noteData = '';


while($row = $c_data->fetch_assoc()){
    $notesId = $row['note_id'];
    $noteData .= '

    <tr>
    <td onclick="showNoteContent('.$row["note_id"].')">
        <div class="note">
            <div class="noteTitle">'.substr($row["note_title"],0,50).'</div>
            <div class="noteContent">'.substr($row["note_content"],0,230).'</div>
            <div class="bottomNote">
                <div class="timeStamp">'.$row["created_at"].'</div>
                <div class="actions">
                    <button  class="delete-note" data-note-id="13"><a href = "../actions/deleteNotes.php?note_id='.$notesId.'"><img src="../assets/delete.png" alt="delete task" class ="deleteB" ></a></button>
                </div>
            </div>
        </div>
    </td>
</tr>
    	';
} -->

<?php
include '../actions/getAllNotes.php';

$c_data = allNotes();
$noteData = '';

if ($c_data->num_rows > 0) {
    while($row = $c_data->fetch_assoc()){
        $notesId = $row['note_id'];
        $noteData .= '
            <tr>
                <td onclick="showNoteContent('.$row["note_id"].')">
                    <div class="note">
                        <div class="noteTitle">'.substr($row["note_title"],0,50).'</div>
                        <div class="noteContent">'.substr($row["note_content"],0,230).'</div>
                        <div class="bottomNote">
                            <div class="timeStamp">'.$row["created_at"].'</div>
                            <div class="actions">
                                <button  class="delete-note" data-note-id="13"><a href = "../actions/deleteNotes.php?note_id='.$notesId.'"><img src="../assets/delete.png" alt="delete task" class ="deleteB" ></a></button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        ';
    }
} else {
    $noteData = '<tr class="empty-data"><td>You have not created any note yet!</td></tr>';
}

$countNotes = $c_data->num_rows;



?>




