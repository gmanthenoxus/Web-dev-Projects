<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/landing.css">
    <title>Home</title>
    
</head>
<body>
    <div class="content-holder">
        <!-- <?php include "includes/checker.php" ?> -->
    <header>
        <!-- <?php
            if(isset($_POST["logout"])){
                include_once "includes/functions.php";
                logOut();
                header("location: login.php");
                exit();
            }
        ?> -->
        <form action="index.php" method="POST">
            <input type="submit" name="logout" value="Log Out">
        </form>
    </header>
    <section class="banner">
        <div class="content">
            <h1>Welcome {Username}!!!</h1>
            <a href="complaint-form.php" class="landing-btn">Make a Complaint</a>
            <a href="complaint-form.php" class="landing-btn">View Complaints </a>
        </div>

    </section>
    </div>
    
</body>
</html>