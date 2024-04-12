


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN IN</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="wholePage">
    <div class="signIn">
        <div class="welcome">
            <p class="text">
                <span class="letter letter1">W</span>
                <span class="letter letter2">E</span>
                <span class="letter letter3">L</span>
                <span class="letter letter4">C</span>
                <span class="letter letter5">O</span>
                <span class="letter letter6">M</span>
                <span class="letter letter7">E</span>
                <span class="letter letter8">.</span>
                <span class="letter letter9">.</span>
                <span class="letter letter10">.</span>
                </p>
        </div>
        <div class="logo"></div>

        <?php
        session_start();
        require_once "settings/connection.php";

        if(isset($_POST["login"])){
            $username  = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $connection->query($sql);
            $user = $result->fetch_assoc();
        
            // $result = mysqli_query($connection,$sql);
            // $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user) {
                if (password_verify($password,$user["password_hash"])) {
                    $_SESSION['user_id'] = $user['user_id'];
                    header("Location: view/ifocus.php");
                    die();
                } else{
                    echo "<div class = 'alert alert-danger'> wrong password</div>";
                }
            } else {
                echo "<div class = 'alert alert-danger'> Username does not exist </div>";
            }
        }
        ?>

        <form method="post" name="signIn" id="signIn" >
            <label for="username">username</label>
           <br>
            <input placeholder="username" type="username" id="username" name ="username" required/>
            <br>
            <label for="password">password</label>
            <br>
            <input placeholder="password" type="password" id = "password" name ="password" pattern="[a-zA-Z0-9]+[0,9]*">
            <br>
            <div class="login-container">
                <button name="login" type="submit" id = "login" value="Login">Login</button>
            </div>
        </form>
        <!-- Add link to sign up -->
        <div class="subs">Do not have an account? <a href="login/register.php" style="color: rgb(101, 131, 186);">Register</a></div>

    </div>  
     
</div>
    <script src = "js/index.js"></script>
</body>
</html>