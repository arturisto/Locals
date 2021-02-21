<?php
session_start();
require_once "../configs/config.php";

$name = $password = $email = "";
$name_err = $password_err = $email_err = $other_err =  "";
// Processing form data when form is submitted
//Check the input
if (!(empty(trim($_POST["name"]) || empty(trim($_POST["password"])) || empty(trim($_POST["email"]))))) {


    $name = trim($_POST["name"]);
    $password = trim($_POST["password"]);
    //check if email exists and check password
    $sql = "SELECT email FROM users WHERE email = ? ";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    $email = trim($_POST["email"]);
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
            $_SESSION['LOGIN_MESSAGE'] = "email already exists";
        } else {
            //create new user
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = " INSERT INTO users (email,username,password) VALUES (?,?,?)";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $email, $name, $encrypted_password);
            mysqli_stmt_execute($stmt);
            $_SESSION['LOGIN_MESSAGE'] = "user created successfully";
            $_SESSION['USERNAME'] = $name;
            $_SESSION['EMAIL'] = $email;
            $_SESSION['IS_ADMIN'] = false;
            $_SESSION["redirect"] = "user";
            header("Location: /Locals%20Home%20Assignment/web/index.php");
            exit();
        }
    } else {
        $_SESSION['LOGIN_MESSAGE'] = "oops, server error, please check in again later";
    }
}
$_SESSION['LOGIN_MESSAGE'] = "ERROR";
$_SESSION["redirect"] = "signup";
header("Location: /Locals%20Home%20Assignment/web/index.php");
exit();
