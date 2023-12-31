<?php

session_start();
$login = isset( $_SESSION["user"] );

// $login = true;
if (!$login) {
    header("location: index.php");
    exit();
}

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

        <?php if(isset($_GET["error"])) : ?>
            <div class="alert alert-warning">Cannot Upload File</div>
        <?php endif ?>

        <?php if(file_exists("_actions/photos/profile.jpg")) : ?>
            <img src="_actions/photos/profile.jpg" alt="Profile Photo" class="img-thumbnail" width="300">
        <?php endif ?>

        <form action="_actions/upload.php" method="post" enctype="multipart/form-data" class="my-4 input-group">
            <input type="file" name="photo" class="form-control">
            <button class="btn btn-secondary">Upload</button>
        </form>

        <ul class="list-group mb-3">
            <li class="list-group-item"><b>Name:</b> Alice</li>
            <li class="list-group-item"><b>Email:</b> alice@gmail.com</li>
            <li class="list-group-item"><b>Phone:</b> 387928492</li>
            <li class="list-group-item"><b>Address:</b> Some Address</li>
        </ul>

        <a href="_actions/logout.php" class="text-danger">Logout</a>
    </div>
</body>
</html>