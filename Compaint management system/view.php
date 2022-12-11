<?php
    include_once "includes/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaints</title>
</head>
<body>
<table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Complaints</th>
        </tr>

        <?php
            $sql = "SELECT * FROM complains";
            $result = $conn->query($sql);


            while ($dataRows = $result->fetch_assoc()){
                $id = $dataRows["id"];
                $fname = $dataRows["firstname"];
                $lname = $dataRows["lastname"];
                $email = $dataRows["email"];
                $dept = $dataRows["course"];
                $complaint = $dataRows["complaint"];

                echo "<tr>
                   <td>". $id . "</td> 
                   <td>". $fname . "</td>
                   <td>". $lname . "</td>
                   <td>". $email . "</td> 
                   <td>". $dept . "</td> 
                   <td>". $complaint . "</td>
                </tr>";
            }
        ?>
    </table>
</body>
</html>