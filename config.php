<?php
$connection = mysqli_connect('localhost', 'root', '', 'eshurinit');



if ($connection) {
    // echo "Connected to database successfully";
} else {
    echo "Connection failed";
}
