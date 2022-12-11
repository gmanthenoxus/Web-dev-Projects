<!-- <?php
    session_start();

    if (isset($_SESSION["id"])){
        header("location: index.php?status=alreadylogged");
        exit();
    }

    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        require_once "includes/db.php";
        require_once "includes/functions.php";

        if (emptyInputLogin($email, $pwd) != false){
            header("location: login.php?status=emptyinput");
            exit();
        }
        if (invalidEmail($email) != false){
            header("location: login.php?status=invalidemail");
            exit();
        }

        loginUser($conn, $email, $pwd);
    }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/Credentials.css">
    <title>Log In</title>
</head>
<body>
    <div class="content"> 
        <div id="form-wrap">
            <h2>Log In</h2>
            <form id="login-form" action="login.php" method="POST">
                    <input type="text" placeholder="ID" name="email" required><br>
                    <input id="form-input" type="password" placeholder="Password" name="pwd" required><br> 
                    <input id="form-input" type="submit" name="login"><br>
            </form>
            
        </div>
        <div>
            <p id="credential-alternative"> New here ? <a href="signup.php">Sign Up</a> </p>
        </div>
    </div>
    
</body>
</html>