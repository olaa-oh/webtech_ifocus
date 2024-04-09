<?php
include 'functions/todo_fxn.php';
include 'functions/notes_fxn.php';
include 'functions/displayNotes.php';
// session_start();

// // Check if user is logged in
// if(!isset($_SESSION['user_id'])) {
//     // Redirect to login page if not logged in
//     header("Location: login/login.php");
//     exit();
// }
?>

<!DOCTYPE html>   
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFOCUS</title>
</head>
<link rel="stylesheet" href="css/style.css">
<body>
    <div class="wholeContainer">
        <div class="header">

            <div class="logo">
                <span>iFocus</span>
            </div>
            <div class="leftNav">

                <div class="profile">
                    <div id="profilePopup" >
                        <div id = "profileHeader">Your Bio</div>
                        <p  class = "profileName">Username: <span class = "displayInfo"></span></p>
                        <p class = "profileName">Email: <span class = "displayInfo"></span></p>
                        <form method="post" action="" id = "logoutform">
                            <input type="submit" name="logout" value="Logout" id = "logoutBtn">
                        </form>
                    </div>

                    <!-- <php echo $email; > display user data -->

                        <button onclick="toggleProfilePopup()" id = "profileBtn"><img src="assets\user.png" alt="profile" style="width: 30px;"></button>

                </div>

                <div class="toggle-btn" id = "btn">
                    <img src="assets/moon.png" alt="" id ="btnIcon">
                </div>
            </div>
        </div>
        <div class="blocks">
            <div class="timerTodo">
                <div class="timerBox">
                    <div class="pos">
                        <div id="timerProgress">
                            <div id="timer">25:00</div>
                            <div id="mode">focus</div>
                        </div>
                
                    </div>
                    <div class="controls">
                        <div><button id = "reset" onclick="reset()"><img src="assets\undo.png" alt="reset" title="reset" style="width: 30px;"></button></div>
                        <div ><button id="start" >START</button></div>
                        <div><button id = "add" ><img src="assets\plus.png" alt="reset" title="add time" style="width:30px;"></button></div>
                        <dialog>
                            <div class="insideDialog">
                                <div class="dialogText">SET TIME</div>
                                <div class="userInput">
                                    <label for="focusTime">Focus Time</label>
                                    <input type="number" class = "timeInput" name = "focusTime" id ="focusTime_settings" value ="25" min ="0" max="60" step="5">
                                </div>
                                <div class="userInput">
                                    <label for="restTime">Rest Time</label>
                                    <input type="number" class = "timeInput" name = "restTime" id ="restTime_settings" value ="15" min ="0" max="60" step="5">
                                </div>
                                <div class="userInput">
                                    <label for="intervals">Cycles</label>
                                    <input type="number" class = "timeInput" name = "interTime" id ="interTime" value ="1" min ="0" max="60" step="1">
                                </div>
                                <div class="dialogControls">
                                    <button class = "dc" id ="apply" onclick="userInput()">APPLY</button>
                                    <button class = "dc" id ="closeBtn">CLOSE</button>
                                </div>


                            </div>

                        </dialog>

                    </div>
                </div>
                <!-- Todo section  -->
                <div class="todo">
                    <div id="todoHeader">
                        <div id="todoTitle">
                        To-Do List
                        <!-- add img -->
                        </div>
                        <div id="todoCat">
                            <div class="cat">Completed_
                                <div class="catNum" id = "comNum">
                                    <?php
                                    echo $completedCount;
                                    ?>
                                </div>
                            </div>
                            <div class="cat">All Tasks_
                                <div class="catNum" id = "allNum">
                                    <?php
                                    echo $pendingCount;
                                    ?>
                                </div>
                            </div>
                            <!-- change bin with image -->
                            <div class="cat">Recycle Bin_
                                <div class="catNum" id = "reNum">
                                    <?php
                                    echo $cancelledCount;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="actions\addTodo.php" id ="todoForm" method = "post">

                        <div class="todoRow">
                            <input type="text" id = "todoText" name = "todo" placeholder = "Add task......" required>
                            <button id ="addBtn" name = "addBtn" type ="submit">Add</button>

                        </div>
                    </form>
                    <div class="listTodos">
                            <?php
                            echo $data;
                            ?>
                                <!-- <li class = "complete">
                                <div class = "stats">
                                    <div class = "todoLines">
                                        <input type="checkbox" name = "tasks" id = "2">
                                        <span>Task 2</span>
                                    </div>
                                    <button title ="delete task"  class = "deleteTask">
                                        <img src="assets/close.png" alt="delete task"class ="deleteB" >

                                    </button>
                                </div>
                                </li> -->

                        
                    </div>
                </div>
            </div>
            <!-- Have it in such a way that it displays without disabling -->
            <div class="notes">
                <div class="notesHeader">
                    <div class="notesTitle"> NOTES</div>
                        <form action="actions/search.php" class="searchNotes">
                            <div class="searchBox">
                                <input type="text" onfocus = "show_results()" onblur = "hide_results()" oninput = "get_data(this.value)" class = "search js-search"name = "text" id = "text" placeholder = "search notes......" >
                                <button id="searchBtn"><img src="assets\search.png" alt="search" title = "search notes" style = "width:20px;cursor:pointer;"></button>
                            </div>
                            <div class="results js-results hide">
                                <div class="res"></div>
                            </div> 

                        </form>
                    <div class="addNote"><button onclick = "openModal()" id="addNote"><img src="assets\add.png" alt="add" title = "add notes" style = "width:20px;cursor:pointer;"></button></div>
                </div>
                    
                    <!-- <div class="modalWrapper"> -->
                        <div class="modalContainer">
                            <div class="modalContent">
                                <div class="modalHeader">
                                <button onclick = "closeModal()" id = "closeModal"><img src="assets\close.png" alt="close" title = "close note" style = "width:10px;cursor:pointer;"></button>
                                    New Note
                                </div>
                                <form action="actions\addNotes.php" method = "POST" id =noteForm  >
                                    <div class="noteT">
                                        <input type="text" name = "titleNote" id = "titleNote" placeholder = "title......" required>
                                        <button id="saveNote" name = "saveNote"><img src="assets\tick.png" alt="saveNote" title = "save note" style = "width:20px;cursor:pointer;"></button>
                                    </div>
                                    <div class="nContent">
                                        <textarea wrap = "hard" maxlength = "60000" name="noteContent" id="noteContent" cols="55" rows="42" required></textarea>
                                    </div>
                                </form>
                            </div>
                        <!-- </div> -->

                    </div>
                <div class="notesBody">
                    <table>
                        <?php
                        echo $noteData;
                        ?>
                    </table>
                    <script src="js/handleDeleteNote.js"></script>
                </div>
                <div class="notesFooter"></div>
            </div>
        </div>


        

        </div>
        <div class="footer">
            <div class="footerContent">

                <h1> Boost Your Productivity with the Pomodoro Technique and Todo Lists</h1>

                        <h2>Introduction:</h2>
                        <p>Welcome to the ultimate guide on enhancing productivity through the powerful combination of the Pomodoro Technique and Todo Lists. In today's fast-paced world, managing time effectively is essential for achieving your goals and maximizing productivity. Whether you're a student, professional, or entrepreneur, mastering these techniques can significantly improve your efficiency and reduce procrastination. Let's dive into the details of how you can leverage these methods to skyrocket your productivity.</p>

                        <h2>Understanding Productivity:</h2>
                        <p>Productivity is the measure of how efficiently you utilize your time and resources to accomplish tasks and achieve your goals. It's not just about working harder but also about working smarter. By adopting effective strategies and tools, you can optimize your workflow and accomplish more in less time.</p>

                        <h2>The Pomodoro Technique:</h2>
                        <p>Developed by Francesco Cirillo in the late 1980s, the Pomodoro Technique is a time management method that helps you break down work into intervals, traditionally 25 minutes in length, separated by short breaks. Here's how it works:</p>
                        <ol>
                            <li>Choose a task you want to work on.</li>
                            <li>Set a timer for 25 minutes (a "Pomodoro").</li>
                            <li>Work on the task until the timer rings.</li>
                            <li>Take a short break (usually 5 minutes).</li>
                            <li>After completing four Pomodoros, take a longer break (15-30 minutes).</li>
                        </ol>
                        <p>This technique leverages the psychological principle of timeboxing, which helps you maintain focus and avoid burnout. By dividing your work into manageable chunks and incorporating regular breaks, you can maintain high levels of concentration and productivity throughout the day.</p>

                        <h3>The Benefits of the Pomodoro Technique:</h3>
                        <ul>
                            <li>Improved focus and concentration: By working in short, focused bursts, you can eliminate distractions and stay fully engaged with your tasks.</li>
                            <li>Enhanced time management: Breaking down tasks into Pomodoros helps you estimate how long different activities will take, allowing for better planning and prioritization.</li>
                            <li>Reduced procrastination: The Pomodoro Technique encourages you to start working on tasks without delay, making it easier to overcome procrastination and maintain momentum.</li>
                            <li>Increased productivity: By consistently applying the Pomodoro Technique, you can accomplish more in less time, leading to greater efficiency and output.</li>
                        </ul>

                        <h2>Using Todo Lists:</h2>
                        <p>Todo lists are simple yet powerful tools for organizing your tasks and priorities. By creating a list of things you need to do, you can ensure that nothing falls through the cracks and stay on track with your goals. Here are some tips for effectively using todo lists:</p>
                        <ul>
                            <li>Prioritize tasks: Rank your tasks based on their importance and urgency. Focus on completing high-priority items first to maximize your productivity.</li>
                            <li>Break tasks into smaller steps: Breaking down larger tasks into smaller, more manageable steps makes them less daunting and easier to tackle.</li>
                            <li>Set deadlines: Assign deadlines to each task to create a sense of urgency and accountability.</li>
                            <li>Review and update regularly: Take time to review and update your todo list regularly to reflect changes in priorities and progress.</li>
                        </ul>

                        <h2>Combining the Pomodoro Technique and Todo Lists:</h2>
                        <p>The Pomodoro Technique and todo lists complement each other perfectly, creating a synergistic effect that can supercharge your productivity. Here's how you can integrate these two methods:</p>
                        <ol>
                            <li>Start by creating a todo list with all the tasks you need to accomplish.</li>
                            <li>Prioritize your tasks based on their importance and urgency.</li>
                            <li>Use the Pomodoro Technique to work on each task in focused intervals.</li>
                            <li>Cross off tasks from your todo list as you complete them, giving you a sense of accomplishment and progress.</li>
                            <li>Regularly review and update your todo list to stay organized and on track with your goals.</li>
                        </ol>

                        <h2>Conclusion:</h2>
                        <p>By combining the Pomodoro Technique with todo lists, you can take control of your time and maximize your productivity. Whether you're studying for exams, tackling a work project, or pursuing personal goals, these techniques provide a structured approach to getting things done. Start implementing them today and experience the difference they can make in your life.</p>

            </div>
           


        </div>


    
        <script src = "js/timer.js">   </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src = "js/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Include sweetalert_delete.js -->
        <!-- <script>

                Swal.fire({
                title: "Custom animation with Animate.css",
                showClass: {
                    popup: `
                    animate__animated
                    animate__fadeInUp
                    animate__faster
                    `
                },
                hideClass: {
                    popup: `
                    animate__animated
                    animate__fadeOutDown
                    animate__faster
                    `
                }
                });
        </script> -->
        <script type = "text/javascript">

        function get_data(text) {
            // if (text.trim()) == ""{
            //     return;
            // }
            var form = new FormData();
            form.append('text', text);

            var ajax = new XMLHttpRequest();

            ajax.addEventListener('readystatechange',function(){
                if(this.readyState === 4 && this.status === 200){
                    handle_result(ajax.responseText);
                }
            });
            ajax.open('POST','actions/search.php',true);
            ajax.send(form);
        }

        function handle_result(data){
            // console.log(data);
            // var results = document.querySelector('.js-results');
            // results.innerHTML = data;
            var results_div = document.querySelector('.js-results');
            var str = "";

            var obj = JSON.parse(data);

            for(var i=obj.length-1; i>=0; i--){
                // str += `<a href = 'info.php?id =${obj[i].note_id'} ><div class = 'res'>` + obj[i].note_title + "</div> </a>";

                // str += "<div class = 'res'>" + obj[i].note_title + "</div> ";
                 str +=   `<a href = "info.php?id=${obj[i].note_id}"><div class = 'res'>` + obj[i].note_title + '</a></div>';

            }
            results_div.innerHTML = str;

                if(obj.length > 0 && obj[0].note_title != ""){
                show_results();
                }
                else{
                    hide_results();
            }
        }


        
        function show_results(){
            var results = document.querySelector('.js-results');
            results.style.display = 'block';
        }

        function hide_results(){
            var results = document.querySelector('.js-results');
            results.style.display = 'none';
        }



        let btn = document.getElementById('btn');
        let btnText = document.getElementById('btnText');
        let btnIcon = document.getElementById('btnIcon');

        btn.addEventListener('click',function()
        {
            document.body.classList.toggle('dark-theme');
            if(document.body.classList.contains('dark-theme')){
                btnIcon.src = 'assets/sun.png';
                btnText.innerHTML = 'Light';

            }else{
                btnIcon.src = 'assets/moon.png';
                btnText.innerHTML = 'Dark';
            }

        });


        function toggleProfilePopup() {
            var popup = document.getElementById("profilePopup");
            if (popup.style.display === "none") {
                popup.style.display = "block";
            } else {
                popup.style.display = "none";
            }
        }

  




    
// 


</script>



        

    </div>
</body>
</html>
