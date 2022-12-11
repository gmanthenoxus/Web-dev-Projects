<?php
    function emptyInputSignup($firstname, $lastname, $email, $course, $password, $confirm_password){
        if (empty($firstname) || empty($lastname) || empty($email) || empty($course) || empty($password) || empty($confirm_password)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function invalidName($firstname, $lastname){
        if(preg_match("/^([a-zA-Z' ]+)$/",$firstname) && preg_match("/^([a-zA-Z' ]+)$/",$lastname)){
            $result =  false;
        }else{
            $result = true;
        }
        return $result;
    }

    function invalidPassword($password, $confirm_password){
        if ($password == $confirm_password){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    
    function userExists($conn, $email){
        $sql = "SELECT * FROM students WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: index.php?status=stmtwrong");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }
    
    function createUser($conn, $firstname, $lastname, $email, $course, $password){
        $sql = "INSERT INTO students (firstname, lastname,  email, course, pwd) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: signup.php?status=stmtfailed");
            exit();
        }

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $course, $hashedpassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: signup.php?status=good");

        sleep(1.5);
        loginUser($conn, $email, $password);

        exit();
    }

    function emptyInputLogin($email, $password){
        if (empty($email) || empty($password)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $email, $pwd){
        $emailExist = userExists($conn, $email);

        if ($emailExist == false){
            header("location: login.php?status=wronglogin");
            exit();
        }

        $hashedpwd = $emailExist["pwd"];
        $checkPassword = password_verify($pwd, $hashedpwd);

        if ($checkPassword ==  false){
            header("location: login.php?status=wrongpassword");
            exit();
        }else if ($checkPassword == true){
            session_start();
            $_SESSION["id"] = $emailExist["id"];
            $_SESSION["firstname"] = $emailExist["firstname"];
            $_SESSION["lastname"] = $emailExist["lastname"];
            $_SESSION["email"] = $emailExist["email"];
            $_SESSION["course"] = $emailExist["course"];
            header("location: index.php");
        }
    }

    function idExists($conn, $id){
        $sql = "SELECT * FROM students WHERE id = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: index.php?status=stmtwrong");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function logOut(){
        session_start();
        session_unset();
        session_destroy();
    }
?>