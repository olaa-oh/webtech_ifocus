<!-- //create register form -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="../css/register.css">
    
</head>
<body>
    <div class="container">
    <?php
    // print_r($_POST);
    if(isset($_POST["submit"])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];

        $passwordHash = password_hash($password , PASSWORD_DEFAULT);
        $errors = array();

        // checking validation with errors
        if(empty($username) OR empty($email) OR empty($password) OR empty($passwordConf) ){
            array_push($errors, "All fields are required");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errors, "Email is not valid.Try again");
        }
        if(strlen($password)<8){
            array_push($errors, "Password must be at least 8 characters");
        }
        if($password != $passwordConf){
            array_push($errors, "Password do not match");
        }

        // checking if email already exists
        require_once "../settings/connection.php";
        $sql = "SELECT * from user where username = '$username'";
        $result = mysqli_query($connection,$sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount>0){
            array_push($errors , "Username already exists!");
        }

        if(count($errors)>0){
            foreach($errors as $error){
                echo "<div class 'alert alert -danger'> $error</div>";
            }
        }else{
            // insert into db
            
            $query = "INSERT INTO  user (username,email,password_hash)  VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($connection);
            $prepareStmt = mysqli_stmt_prepare($stmt,$query);
            if($prepareStmt){
                mysqli_stmt_bind_param($stmt, "sss",$username,$email,$passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class = 'alert alert-success'> You are registered successfully.</div>";
            }else{
                die("Something is wrong");
            }
        }
    }
    ?>
        <form action="register.php" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label for="passwordConf">Confirm Password:</label>
                <input type="password" name="passwordConf" required>
            </div>
            <input type="submit" value = "Register" name = "submit">
            <p>Already a user? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>