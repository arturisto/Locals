<form class="w-25 m-auto" action="./functions/signup.php" method="POST">
    <?php echo (isset($_SESSION['LOGIN_MESSAGE'])) ?
        '    <div class="alert alert-warning alert-dismissible fade show" role="alert">
 ' . $_SESSION['LOGIN_MESSAGE'] . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>' : ""; ?>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
    </div>
    <div class="mb-3">
        <div style="color:red"><?php $name_err ?></div>
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class=" mb-3">

        <button type="submit" name="submit" class="btn btn-primary">Sign up</button>
    </div>
</form>