<?php
session_start();
require_once "../configs/config.php";
$sql = "";
$admin_user =  $_SESSION['USERNAME'];
$msg = "";
if (isset($_POST['ADMIN_ACTION'])) {
    $date = date("Y-m-d");
    $target_id = $_POST['ID'];
    switch ($_POST['ADMIN_ACTION']) {

        case "approve":
            $msg = $target_id;
            $sql = "UPDATE feedbacks SET acceptedAt ='$date', AcceptedBy ='$admin_user' WHERE ID ='$target_id'";
            break;
        case "delete":
            $sql = "UPDATE feedbacks SET deletedAt ='$date', DeletedBy ='$admin_user' WHERE ID ='$target_id'";
            break;
        case "update":
            $text = $_POST['TEXT'];
            $sql =  "UPDATE feedbacks SET updatedAt ='$date', feedback='$text' WHERE ID ='$target_id'";
            break;
    }

    if (mysqli_query($link, $sql)) {
        echo  "success";
    } else {
        echo "error";
    }
}
