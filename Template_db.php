<?php

include './dbconnection.php';

$title = $_POST['title'];
$description = $_POST['description'];

$sql = "INSERT INTO `template`(`title`, `description`) VALUES ('$title','$description')";

if (mysqli_query($connect, $sql)) {
    echo "New template successfully created";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}


