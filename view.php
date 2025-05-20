<?php

include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's records</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background: #f4f4f4;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        text-align: left;
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007BFF;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    caption {
        font-size: 1.5em;
        margin-bottom: 10px;
        font-weight: bold;
        color: #333;
    }
</style>

<body>

    <table border="1">

        <thead>
            <tr>
                <th>Student ID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Age</th>
                <th>DOB</th>
                <th>Address</th>
                <th>Date</th>
            </tr>
        </thead>


        <tbody>
            <?php
            $get_students = mysqli_query($connection, "SELECT * FROM `student`");
            while ($row = mysqli_fetch_assoc($get_students)) {
            ?>
                <tr>
                    <td><?php echo $row['StudentID'] ?></td>
                    <td><?php echo $row['FirstName'] ?></td>
                    <td><?php echo $row['LastName'] ?></td>
                    <td><?php echo $row['Age'] ?></td>
                    <td><?php echo $row['DOB'] ?></td>
                    <td><?php echo $row['Address'] ?></td>
                    <td><?php echo $row['Date'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>


</body>

</html>