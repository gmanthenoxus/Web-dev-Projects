<?php
    function insertComplaint($conn, $complaint){
        $sql = "INSERT INTO complains (firstname, lastname, email, course, complaint) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: complaint-form.php?status=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sssss", $_SESSION["firstname"], $_SESSION["lastname"], $_SESSION["email"], $_SESSION["course"], $complaint);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
?>