<?php
    if (isset($_GET["status"])){
        if ($_GET["status"] == "emptyinput"){
            echo "<div class='status-message'>Fill in all inputs!</div>";
        }elseif ($_GET["status"] == "invalidinput"){
            echo "<div class='status-message'>Fill the form properly!</div>";
        }elseif ($_GET["status"] == "usedemail"){
            echo "<div class='status-message'>An account already exists with this email!</div>";
        }elseif ($_GET["status"] == "wrongpassword"){
            echo "<div class='status-message'>Incorrect Password!</div>";    
        }elseif ($_GET["status"] == "stmtfailed"){
            echo "<div class='status-message'>Something went wrong, try again later!</div>";
        }elseif ($_GET["status"] == "wronglogin"){
            echo "<div class='status-message'>Incorrect login information!</div>";
        }elseif ($_GET["status"] == "good"){
            echo "<div class='success-message'>You signed up successfully!</div>";
        }elseif($_GET["status"] == "alreadylogged"){
            echo "<script>
                alert('You are already logged in!');
            </script>";
        }else if ($_GET["status"] == "stmtwrong"){
            echo "<script>
                alert('Something went wrong!');
            </script>";
        }else if($_GET["status"] == "changedpass"){
            echo "<script>
                alert('Password has been changed!');
            </script>";
        }else if($_GET["status"] == "changedemail"){
            echo "<script>
                alert('E-Mail has been changed');
            </script>";
        }else if($_GET["status"] == "successcomplaint"){
            echo "<script>
                alert('Complaint has bee sent');
            </script>";
        }
    }
?>