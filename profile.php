<?php
    // Step 8 - profile
    // update codes by using Auth class => for checking session
    include("vendor/autoload.php");

    use Helpers\Auth;

    $user = Auth::check();  // get "user" data from session (who is logged in)
    
    // Step 1 - old version for checking session
    /*
    // start session to use session data
    session_start();    
    $login = isset( $_SESSION["user"] );

    // if there is no “user” data in session, redirect to "index" page
    if (!$login) {  
        header("location: index.php");     // return Response Header
        exit();     // stop PHP action
    }
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5" style="max-width: 800px;">
        <h1 class="h3 mb-4">Profile</h1>

        <!-- Step 2 start -->
        <!-- if there is "error" in url query, show error -->
        <?php if(isset($_GET["error"])) : ?>    
            <div class="alert alert-warning">Cannot Upload File</div>
        <?php endif ?>

        <!-- check if there is profile photo & show the photo --> 
        <!-- old version - if (file_exists("_actions/photos/profile.jpg")) : -->
        <?php if ($user->photo) : ?>    <!-- Step 8 - profile -->
            <img src="_actions/photos/<?= $user->photo ?>" alt="Profile Photo" class="img-thumbnail" width="300">
        <?php endif ?>

        <!-- form for uploading profile photo -->
        <form action="_actions/upload.php" method="post" enctype="multipart/form-data" class="my-4 input-group">
            <input type="file" name="photo" class="form-control">
            <button class="btn btn-secondary">Upload</button>
        </form>
        <!-- Step 2 end -->

        <!-- Step 1 start -->
        <ul class="list-group mb-3"> <!-- Step 8 - profile -->
            <li class="list-group-item"><b>Name:</b> <?= $user->name ?></li>
            <li class="list-group-item"><b>Email:</b> <?= $user->email ?></li>
            <li class="list-group-item"><b>Phone:</b> <?= $user->phone ?> </li>
            <li class="list-group-item"><b>Address:</b> <?= $user->address ?> </li>
        </ul>

        <a href="_actions/logout.php" class="text-danger">Logout</a>
        <!-- Step 1 end -->

        <a href="admin.php">Admin</a>
    </div>
</body>
</html>