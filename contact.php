<?php

$con = mysqli_connect('localhost', 'root', '', 'community');
if ($con) {
    // echo "Database connected successfully!";
} else {
    echo "Failed to connect!";
}


if (isset($_POST['save_data'])) {
    // echo "Button clicked!";

    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $lastname = $_POST['lastname'];
    $message = $_POST['message'];

    $sql = mysqli_query($con, "INSERT INTO `message`(`FirstName`, `LastName`, `Email`, `Message`)
    VALUES ('$firstname', '$lastname', '$email', '$message')");


    if ($sql) {
        echo "<script>alert('Thanks for your message!')</script>";
        echo "<script>window.location.href='contact.php'</script>";
    } else {
        echo "<script>alert('Failed to send a message!')</script>";
        echo "<script>window.location.href='contact.php'</script>";
    }

    // echo $firstname . '<br>';
    // echo $lastname . '<br>';
    // echo $email . '<br>';
    // echo $message;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon-32x32.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>eShuri Team Community Support</title>
</head>

<body>

    <!-- Parent hold children -->
    <div class="container">
        <div class="img-container"></div>
        <div class="form-container">
            <form action="contact.php" method="post">
                <h1>Send us a message</h1>
                <div class="field">
                    <label>Name <span>*</span></label>

                    <div class="flex-fields">
                        <div class="field">
                            <input type="text" name="firstname" placeholder="---------------------" required>
                            <label style="color: #ccc;">First</label>
                        </div>

                        <div class="field">
                            <input type="text" name="lastname" placeholder="---------------------" required>
                            <label style="color: #ccc;">Last</label>
                        </div>
                    </div>

                    <div class="field">
                        <label>Email <span>*</span></label>
                        <input type="email" name="email" placeholder="---------------------" required>
                    </div>

                    <div class="field">
                        <label>Type your message here <span>*</span></label>
                        <textarea name="message" required></textarea>
                    </div>

                    <div class="btns">
                        <button type="submit" name="save_data">Submit</button>
                    </div>


                </div>
            </form>
        </div>

    </div>


</body>

</html>