<?php
    session_start();

    if (!isset($_SESSION["id"])){
        header("location: login.php");
        exit();
    }

    if(isset($_POST["submit"])){
        include_once "includes/db.php";
        include_once "includes/complaint.inc.php";

        $complaint = $_POST["complaint"];

        insertComplaint($conn, $complaint);
        header("location: index.php?status=successcomplaint");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>
</head>
<body>
    <form action="complaint-form.php" method="POST">
        <input type="text" name="complaint" style="height: 40px;" required>
        <input type="submit" name="submit">
    </form>
</body>
</html>