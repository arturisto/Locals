<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['login'])) {
        $_SESSION["redirect"] = "login";
        header("Location:index.php");
        exit();
    } elseif (!empty(trim($_POST["signup"]))) {
        session_unset();
        $_SESSION["redirect"] = "signup";
        header("Location:index.php");
        exit();
    } elseif (!empty(trim($_POST["logout"]))) {
        session_unset();
        $_SESSION["redirect"] = "home";
        header("Location:index.php");
    } else {
        session_unset();
        $_SESSION["redirect"] = "home";
    }

    header("Location:index.php");
    exit();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <button type="submit" class="btn btn-light btn-lg px-3" name="home" value="home">myAPP</button>
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <ul class="navbar-nav">
                <?php
                if (!empty($_SESSION["USERNAME"])) {
                    echo '  
                    <li class="nav-item">
                     <div  class="btn">Welcome ' . $_SESSION["USERNAME"] . '</div>
                    </li>
                    <li class="nav-item">
                     <button type="submit" class="btn" name="logout" value="logout">Logout</button>
                 </li>';
                } else {
                    echo ' 
                    <li class="nav-item active">
                    <button type="submit" class="btn" name="signup" value="signup">Sign up</button>
                    </li>
                    <li class="nav-item active">
                    <button type="submit" class="btn" name="login" value="login">Login</button>
                    </li>';
                }
                ?>
            </ul>
        </form>
    </div>
    </form>

</nav>