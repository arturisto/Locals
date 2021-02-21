<?php

if (isset($_SESSION["redirect"]) && !empty($_SESSION["redirect"])) {
    switch ($_SESSION["redirect"]) {
        case "login":
            include "login.php";
            break;
        case "signup":
            include "signup.php";
            break;
        case "admin":
            include "admin.php";
            break;
        case "user":
            include "user.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
