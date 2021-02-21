<?php
session_start();
require_once "../configs/config.php";


$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
if (isset($_FILES["file"])) {
    $file = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));
    $query = "INSERT INTO feedbacks(email,name,feedback , image) VALUES ('$email','$name','$feedback','$file')";
} else {
    $query = "INSERT INTO feedbacks(email,name,feedback) VALUES ('$email','$name','$feedback')";
}

if (mysqli_query($link, $query)) {
    echo 'Image Inserted into Database';
} else {
    echo "error";
}
