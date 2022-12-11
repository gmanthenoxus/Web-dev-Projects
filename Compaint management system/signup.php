<?php
    session_start();

    if (isset($_SESSION["id"])){
        header("location: index.php?status=alreadylogged");
        exit();
    }

    if(isset($_POST["signup"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $course = $_POST["course"];
        $pwd = $_POST["pwd"];
        $confirm_pwd = $_POST["confirm_pwd"];

        require_once "includes/db.php";
        require_once "includes/functions.php";

        if (emptyInputSignup($firstname, $lastname, $email, $course, $pwd, $confirm_pwd) != false){
            header("location: signup.php?status=emptyinput");
            exit();
        }
        if (invalidEmail($email) != false || invalidName($firstname, $lastname) != false || invalidPassword($password, $confirm_password) != false){
            header("location: signup.php?status=invalidinput");
            exit();
        }
        if (userExists($conn, $email) != false){
            header("location: index.php?status=usedemail");
            exit();
        }

        createUser($conn, $firstname, $lastname, $email, $course, $pwd);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/Credentials.css">
    <title>Sign Up</title>
</head>
<body>
    <div>
        <div id="form-wrap">
            <h2>Sign Up</h2>
            <form id="login-form-signup" action="signup.php" method="POST">
                <input type="text" placeholder="First Name" name="firstname" required>
                <input id="form-input" type="text" placeholder="Last Name" name="lastname" required>  
                <input id="form-input" type="email" placeholder="E-Mail" name="email" required>
                <select id="form-input" name="course" required>
                    <option disabled selected hidden>Choose your course:</option>
                    <option value="CSC">Computer Science</option>
                    <option value="CYB">Cyber Security</option>
                    <option value="CENG">Computer Engineering</option>
                    <option value="SENG">Software Engineering</option>
                    <option value="EEE">Electrical Engineering</option>
                    <option value="CVE">Civil Engineering</option>
                    <option value="ITF">Information Technology</option>
                    <option value="BTC">Biotechnology</option>
                    <option value="BIO">Biochemistry</option>
                    <option value="MCB">Microbiology</option>
                    <option value="MEC">Mechcanical Engineering</option>
                    <option value="MEE">Mechatronics Engineering</option>
                    <option value="ARC">Architecture</option>
                    <option value="ECO">Economics</option>
                    <option value="POL">Political Science</option>
                    <option value="IRI">International Relations</option>
                    <option value="PBA">Public Administration</option>
                    <option value="ACC">Accouting</option>
                    <option value="MAS">Mass Communication</option>
                    <option value="SOO">Sociology</option>
                    <option value="LAW">Law</option>
                    <option value="MED">Medicine</option>
                    <option value="PBH">Public Health</option>
                </select>
                <div class="form-item-queue-container">
                    <div class="form-item-queue">
                        <input id="form-input" type="password" placeholder="Password" name="pwd" required>
                    </div>
                    <div class="form-item-queue">
                        <input id="form-input" type="password" placeholder="Confirm Password" name="confirm_pwd" required>
                    </div>
                </div>
                <input id="form-input" type="submit" name="signup">
            </form>      
        </div>
        <div>
            <p id="credential-alternative"> Done this already? <a href="login.php">Login</a></p>
        </div>
    </div>
    
    
</body>
</html>