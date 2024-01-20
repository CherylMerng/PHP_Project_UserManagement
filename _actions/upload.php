<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

// Step 8 - profile photo
$table = new UsersTable(new MySQL);
$user = Auth::check();  // Get userid from Auth::check() - session

// Step 2 - old version

// get file name, type & type from $_FILE superglobal variable
$name = $_FILES["photo"]["name"];
$type = $_FILES["photo"]["type"];
$tmp = $_FILES["photo"]["tmp_name"];

// check photo - image file type
if ($type == "image/jpeg" or $type == "image/png") {
    // move file location  // give photo name as constant => for update photo feature
    // move_uploaded_file( $tmp, "photos/profile.jpg");
    move_uploaded_file($tmp,"photos/$name");

    // save photo in database
    $table->updatePhoto($name, $user->id);
    // save photo in session - session refresh
    $user->photo = $name;

    // header("location: ../profile.php");
    HTTP::redirect("/profile.php");
}
else {
    // if there is error, redirect to profile page together with "error" url query
    // header("location: ../profile.php?error=type");
    HTTP::redirect("/profile.php","error=type");
}
