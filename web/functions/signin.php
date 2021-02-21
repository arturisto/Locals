<?php
session_start();
require_once "../configs/config.php";

$name = $password = $email = "";
$name_err = $password_err = $email_err = $other_err =  "";
// Processing form data when form is submitted
//Check the input
if ((empty(trim($_POST["email"]) && empty(trim($_POST["password"]))))) {

    $password = trim($_POST["password"]);
    //check if email exists and check password
    $sql = "SELECT email, password, username, isAdmin FROM users WHERE email = ?";
    $stmt = mysqli_prepare($link, $sql);

    mysqli_stmt_bind_param($stmt, "s", $email_param);
    $email_param = trim($_POST["email"]);
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
            //login successful
            mysqli_stmt_bind_result($stmt, $fetched_email, $hashed_password, $fetched_name, $isAdmin);
            mysqli_stmt_fetch($stmt);
            if (password_verify($password, $hashed_password)) {
                $_SESSION['USERNAME'] = $fetched_name;
                $_SESSION['EMAIL'] =  $fetched_email;
                $_SESSION['IS_ADMIN'] = $isAdmin;
                $isAdmin ? $_SESSION["redirect"] = "admin" : $_SESSION["redirect"] = "user";
                header("Location: /Locals%20Home%20Assignment/web/index.php");
                exit();
            } else {
                $_SESSION['LOGIN_MESSAGE'] = "Password is not matching";
            }
        } else {
            $_SESSION['LOGIN_MESSAGE'] = "email not found";
        }
    } else {
        $_SESSION['LOGIN_MESSAGE'] = "Server Error, please check back again later";
    }
}
$_SESSION["redirect"] = "login";
header("Location: /Locals%20Home%20Assignment/web/index.php");
exit();
