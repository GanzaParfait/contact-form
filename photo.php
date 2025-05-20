<?php
include "config.php";

if (isset($_POST['upload'])) {

    $file = $_POST['name'];
    $image_name = $_FILES['image']['name'];
    $temporary_name = $_FILES['image']['tmp_name'];


    $new_file_name = date('Ymdhsi');

    if (move_uploaded_file($temporary_name, './uploaded_files/' . $image_name)) {

        $sql = mysqli_query($connection, "INSERT INTO `files`(`Name`, `Image`)
        VALUES ('$file', '$image_name')");


        if ($sql) {
            header("Location: photo.php?message=A file has been uploaded successfully!");
        } else {
            header("Location: photo.php?message=Something went wrong while uploading a file!");
        }
    } else {
        header("Location: photo.php?message=Something went wrong while uploading a file!");
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload an image within DB</title>
</head>

<body>


    <h1>Upload an image</h1>


    <?php

    if (isset($_GET['message'])) {
        $msg = $_GET['message'];
        echo "<p>$msg</p>";
    }

    ?>

    <form action="photo.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Photo name....">
        <input type="file" name="image" accept="image/*">
        <button type="submit" name="upload">Upload image</button>
    </form>



    <h1>View Image</h1>

    <?php

    $get_files = mysqli_query($connection, "SELECT * FROM `files` ORDER BY files.Name ASC");


    while ($row = mysqli_fetch_array($get_files)) {
    ?>
        <div class="file-container">
            <img src="uploaded_files/<?= $row['Image']; ?>" alt="<?= $row['Name']; ?>">
            <p class="img-name"><?= $row['Name']; ?></p>
        </div>
    <?php
    }

    ?>


    <!-- <div class="file-container">
        <img src="uploaded_files/2150586578.jpg" alt="">
        <p class="img-name"></p>
    </div> -->


    <style>
        .file-container {
            width: 100px;
            height: auto;
        }

        .file-container img {
            width: 170px;
            height: 120px;
            border-radius: 5px;
        }
    </style>

</body>

</html>