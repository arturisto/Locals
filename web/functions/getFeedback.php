<?php
session_start();
require_once "../configs/config.php";
$empty_date = "0000-00-00";
$sql = "";
if (isset($_POST['ADMIN'])) {
    // admin queries
    switch ($_POST['ADMIN']) {

        case "pending":
            $sql = "SELECT feedback, createdAt, acceptedAt,deletedAt, image,id,email,name FROM feedbacks WHERE DeletedAt='$empty_date' AND acceptedAt='$empty_date'";
            break;
        case "approved":
            $sql = "SELECT feedback, createdAt, acceptedAt,deletedAt, image,id,email,name FROM feedbacks WHERE acceptedAt!='$empty_date' AND acceptedAt >DeletedAt";
            break;
        case "deleted":
            $sql =  "SELECT feedback, createdAt, acceptedAt,deletedAt, image,id,email,name FROM feedbacks WHERE DeletedAt!='$empty_date' AND acceptedAt <=DeletedAt";
            break;
    }
} elseif (isset($_POST['EMAIL'])) {
    // user queries
    $email = trim($_POST["EMAIL"]);
    $sql = "SELECT feedback, createdAt, acceptedAt,deletedAt, image,id FROM feedbacks WHERE email = '$email'";
} else {
    $sql = "SELECT  feedback, createdAt, acceptedAt,deletedAt, image, email,name,id FROM feedbacks";
}
if ($result = mysqli_query($link, $sql)) {
    $return_array = array();
    while ($row = mysqli_fetch_row($result)) {
        //if there is image change to true. Images are being fetched separately upon request
        if ($row[4]) {
            $row[4] = true;
        }
        array_push($return_array, $row);
    };
    echo  json_encode($return_array);
} else {
    echo mysqli_error($link);
}
