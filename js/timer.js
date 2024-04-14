//TIMER calculation ie focus, rest and current times 

let focusTimer = 25*60*1000;
let restTimer = 25*60*1000;
let currentTime = focusTimer;
// let focusIntervals =3;
let countIntervals =2;
let focusIntervals = countIntervals;
let currentMode = "focus";


//update timer progress and main timer
let countdownInterval;
const timerProgress = document.querySelector('#timerProgress');
const timer = document.querySelector('#timer'); 
const mode = document.getElementById('mode'); 


// updateCountdown(currentTime);
// countdown(currentTime);

//function to update the time
function countdown(aTimer) {
    console.log('i');

    countdownInterval=setInterval(()=> {
        aTimer -= 1000;
        if(aTimer <=0 )
        {
            if(focusIntervals>0){
                clearInterval(countdownInterval);
                // window.alert("Starting rest mode");
                changeMode();
                // reset();
            }else {
                clearInterval(countdownInterval);
                // reset();
            }
    }
        // update countdown
        updateCountdown(aTimer)
    },1000)
    }

//function to update the update countdown

function updateCountdown(aTimer){
    console.log('need');


    if(aTimer <=0)
    {
        timerProgress.style.setProperty('--angle','360deg');
        timerProgress.style.setProperty('--color','--var(--color1)');
        timer.innerText = `00:00`;
        // mode.innerText = `END:0`;
    }else {
        // Calculating angle
        let angle = (aTimer/ (currentMode == "focus" ? focusTimer : restTimer) * 360 ) + 'deg';
        let color = currentMode == "focus" ? "var(--color1)" : "var(--color11)";
        timerProgress.style.setProperty('--angle',angle);
        timerProgress.style.setProperty('--color',color);

        //defining minutes and seconds
        let minutes = Math.floor(aTimer/60/1000).toString().padStart(2,"0");
        let seconds = Math.floor((aTimer/1000)%60).toString().padStart(2,"0");
        timer.innerHTML = `${minutes}:${seconds}`;
        mode.innerText = `${currentMode}:${focusIntervals}`;
       

    }

}

// function to change from focus time to rest time

function changeMode(){
    console.log('you');
    currentMode = currentMode == "focus" ? "Rest" : "focus";
    focusIntervals = currentMode == "focus" ? focusIntervals -1: focusIntervals;
    currentTime = currentMode == "focus" ? focusTimer :restTimer; 
    updateCountdown(currentTime);
    countdown(currentTime);

}



// function changeMode() {
//     currentMode = currentMode == "focus" ? "Rest" : "focus";
//     focusIntervals = currentMode == "focus" ? focusIntervals - 1 : focusIntervals;
//     currentTime = currentMode == "focus" ? focusTimer : restTimer;
//     updateCountdown(currentTime);
//     countdown(currentTime);
    
//     // SweetAlert for mode change
//     Swal.fire({
//         position: 'top',
//         icon: 'info',
//         title: `Mode changed to ${currentMode}`,
//         showConfirmButton: false,
//         timer: 1000
//     });
    
//     // Notifying when the entire focus session is over
//     if (focusIntervals === 1 && currentMode === "focus") {
//         Swal.fire({
//             position: 'top',
//             icon: 'success',
//             title: 'Focus session is about to end!  YOU CAN DO IT!',
//             showConfirmButton: false,
//             timer: 1000
//         });
//         // Resetting focus session
//     }
//     text
// }

// function resetSession() {
//     // clearInterval(countdownInterval);
//     currentMode ="focus";
//     currentTime = focusTimer;
//     focusIntervals =countIntervals;

//     updateCountdown(currentTime);
//     countdown(currentTime);
//     clearInterval(countdownInterval);
//     // text.innerHTML = "START";
    

// }







// play and pause
// adding buttons
const startbtn = document.querySelector("#start");

var playing = false;
var period;
// This selects the html content 
let text = document.querySelector("#start")

startbtn.addEventListener("click" ,()=>{
    if(!playing){
        console.log("to")
        text.innerHTML = "PAUSE";
        // clearInterval(countdownInterval);
        countdown(currentTime);
        playing = true
    }
    else{
        console.log("work")
        text.innerHTML = "START";
        clearInterval(countdownInterval);
        let [minutes, seconds] = timer.innerText.split(":");
        currentTime = ((minutes * 60 ) + seconds * 1) * 1000;
        playing = false
    }
})


// reset function
function reset() {
    clearInterval(countdownInterval);
    currentMode ="focus";
    currentTime = focusTimer;
    focusIntervals =countIntervals;

    updateCountdown(currentTime);
    countdown(currentTime);
    clearInterval(countdownInterval);
    text.innerHTML = "START";

    

}


// function changeMode(){
//     console.log('you');
//     currentMode = currentMode == "focus" ? "Rest" : "focus";
//     focusIntervals = currentMode == "focus" ? focusIntervals -1: focusIntervals;
//     currentTime = currentMode == "focus" ? focusTimer :restTimer; 
//     updateCountdown(currentTime);
//     countdown(currentTime);
//     reset();

// }

// user input for timer in minutes

// dialog to request input from users
const dialog = document.querySelector("dialog");
const showButton = document.querySelector("#add");
const closeButton = document.querySelector("#closeBtn");

// "Show the dialog" button opens the dialog modally
showButton.addEventListener("click", () => {
  dialog.showModal();
});

// "Close" button closes the dialog
closeButton.addEventListener("click", () => {
  dialog.close();
});


// apply user input to timer

function userInput () {
    focusTimer = document.getElementById("focusTime_settings").value*60*1000;
    restTimer = document.getElementById("restTime_settings").value*60*1000;
    countIntervals = document.getElementById("interTime").value;
  

    currentTime = focusTimer;
    currentMode ="focus";
    focusIntervals =countIntervals;

    clearInterval(countdownInterval);
    updateCountdown(currentTime);
    dialog.close();
}




const modalContainer = document.querySelector('.modalContainer');

function openModal() {
  modalContainer.style.display = 'block';
}

function closeModal() {
  modalContainer.style.display = 'none';
}









// todo list stuff

// const todoForm = document.querySelector('#todoForm');
// const todo = document.querySelector('.listContainer');
// const comNum = document.querySelector('#comNum');
// const allNum = document.querySelector('#allNum');
// const reNum = document.querySelector('#reNum');
// const todoInput = document.querySelector('#todoText');

// let tasks = JSON.parse(localStorage.getItem('tasks')) || []

// todoForm.addEventListener('submit', (e) => {
//     e.preventDefault();

//     const taskText = todoInput.value;

//     if(taskText == ''){
//         return;
//     }

//     const task = {
//         id: new Date().getTime(),
//         text: taskText,
//         completed: false
//     }

//     tasks.push(task);



// });














































// $(document).ready(function(){
//     $('.delete-note').click(function(){
//         var noteId = $(this).data('note-id');
//         $.ajax({
//             type: 'GET',
//             url: 'delete_note.php',
//             data: { note_id: noteId },
//             dataType: 'json',
//             success: function(response){
//                 if(response.status == 'success'){
//                     alert(response.message);
//                     // You can update the UI here if needed
//                 } else {
//                     alert('Error: ' + response.message);
//                 }
//             },
//             error: function(xhr, status, error){
//                 alert('Error: ' + error);
//             }
//         });
//     });
// });








//  search notes

// function get_data(text) {

//     // var text = document.querySelector('.js-search').value;
//     var form = new FormData();
//     form.append('text', text);

//     var ajax = new XMLHttpRequest();
//     ajax.addEventListener('readystatechange',function() {
//         if(ajax.readyState == 4 && ajax.status == 200) {
//             handle_result(ajax.responseText);
//             // document.querySelector('.js-search-results').innerHTML = ajax.responseText;
//         }

//     });

//     ajax.open('post', 'actions/search.php', true);
//     ajax.send(form);
// }

// function handle_result(result) {
//     // console.log(result);
//     var obj = JSON.parse(result);
//     for(var i = 0; i < obj.length; i++) {
//         var note = obj[i];
//         console.log(note);
//     }
// }

// Add an event listener to the delete buttons
// document.addEventListener('DOMContentLoaded', function() {
//     var deleteButtons = document.querySelectorAll('.deleteNote');

//     deleteButtons.forEach(function(button9) {
//         button9.addEventListener('click', function(event) {
//             event.preventDefault(); // Prevent default behavior of the button
            
//             // Get the note ID from the button's data attribute
//             var noteId = button9.dataset.noteId;

//             // Send an AJAX request to delete the note
//             var xhr = new XMLHttpRequest();
//             xhr.open('GET', '../actions/deleteNotes.php?note_id=' + noteId, true);
//             xhr.onload = function() {
//                 if ( xhr.status === 200 && xhr.readyState === 4) {
//                     // Parse the response JSON
//                     var response = JSON.parse(xhr.responseText);
//                     console.log(response.data);
//                     // Check if deletion was successful
//                     if (response.success) {
//                         // Show SweetAlert success notification
//                         Swal.fire({
//                             icon: 'success',
//                             title: 'Note Deleted',
//                             text: response.message
//                         }).then(function() {
//                             // Reload the page or update the UI as needed
//                             location.reload(); // For example, reload the page
//                         });
//                     } else {
//                         // Show SweetAlert error notification
//                         Swal.fire({
//                             icon: 'error',
//                             title: 'Error',
//                             text: response.message
//                         });
//                     }
//                 } else {
//                     // Show SweetAlert error notification for server error
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'Server Error',
//                         text: 'There was an error deleting the note. Please try again later.'
//                     });
//                 }
//             };
//             xhr.send();
//         });
//     });
// });
