
function deleteNote(note_id) {
    // Send an AJAX request to delete the note
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../actions/deleteNotes.php?note_id=' + note_id, true);
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.readyState === 4) {
            // Parse the response JSON
            var response = JSON.parse(xhr.responseText);
            console.log(response.data);
            // Check if deletion was successful
            if (response.success) {
                // Show SweetAlert success notification
                Swal.fire({
                    icon: 'success',
                    title: 'Note Deleted',
                    text: response.message
                }).then(function() {
                    // Reload the page or update the UI as needed
                    location.reload(); // For example, reload the page
                });
            } else {
                // Show SweetAlert error notification
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        } else {
            // Show SweetAlert error notification for server error
            Swal.fire({
                icon: 'error',
                title: 'Server Error',
                text: 'There was an error deleting the note. Please try again later.'
            });
        }
    }
    xhr.send();
}
