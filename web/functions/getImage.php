<?php
session_start();
require_once "../configs/config.php";
$id = $_POST['ID'];

$query = "SELECT * FROM feedbacks where (ID ='$id') ";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    echo base64_encode($row['image']);
    exit();
};
