<?php
include "config.php";

if (isset($_POST['save'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $dateofbirth = $_POST['dateofbirth'];
    $address = $_POST['address'];
    $date = $_POST['date'];

    $sql = mysqli_query($connection, "INSERT INTO `student`(`FirstName`, `LastName`, `Age`, `DOB`, `Address`, `Date`)
    VALUES ('$firstname', '$lastname', '$age', '$dateofbirth', '$address', '$date')");

    if ($sql) {
        echo "Student information saved successfully!";
    } else {
        echo "Failed to save student information!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
</head>

<body>


    <form action="data.php" method="post">
        <h3>Student Registration Form</h3>
        <label>FirstName:</label>
        <input type="text" name="firstname" placeholder="Enter your firstname...">
        <br>
        <br>
        <label>LastName:</label>
        <input type="text" name="lastname" placeholder="Enter your lastname...">
        <br>
        <br>
        <label>Age:</label>
        <input type="number" name="age" placeholder="Enter your age...">
        <br>
        <br>
        <label>DOB:</label>
        <input type="date" name="dateofbirth">
        <br>
        <br>
        <label>Address:</label>
        <input type="text" name="address" placeholder="Enter your address...">
        <br>
        <br>
        <label>Date:</label>
        <input type="date" name="date">
        <br>
        <br>
        <button type="submit" name="save">Save data</button>
    </form>


</body>

</html>