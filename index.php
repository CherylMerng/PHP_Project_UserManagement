<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center" style="max-width: 600px;">

        <!-- Step 1 start -->
        <h1 class="my-4 h3">Login</h1>

        <!-- message for incorrect info --> <!-- developer's note from login.php -->
        <?php if (isset($_GET["incorrect"])) : ?>
            <div class="alert alert-warning">Incorrect Email or Password</div>
        <?php endif ?>
        <!-- Step 1 end -->
        
        <!-- Step 6 - register start -->
        <!-- message for register successful --> <!-- developer's note from create.php -->
        <?php if (isset($_GET["register"])) : ?>
            <div class="alert alert-info">Account created, please login</div>
        <?php endif ?>
        <!-- Step 6 end -->

        <!-- Step 11 - suspend & unsuspend user -->
        <?php if (isset($_GET["suspended"])) : ?>
            <div class="alert alert-danger">Account suspended</div>
        <?php endif ?>
        <!-- Step 11 end -->

        <!-- Step 1 start -->
        <form action="_actions/login.php" method="post" class="mb-3"> <!-- there is data in $_POST superglobal variable -->
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <button class="btn btn-primary w-100">Login</button>
        </form>

        <a href="register.php">Register</a>
        <!-- Step 1 end -->

    </div>
</body>
</html>