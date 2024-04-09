
var sessionVariable = "<?php echo $_SESSION['your_variable']; ?>";

$(document).ready(function(){
    $('#deleteNote').click(function(){
        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: 'Once deleted, you will not be able to recover this note!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms deletion, redirect to PHP script with note_id parameter
                window.location.href = '../actions/deleteNotes.php?note_id=<?php echo $noteId; ?>';
            }
        });
    });
});
