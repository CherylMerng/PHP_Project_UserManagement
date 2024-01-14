<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$table = new UsersTable(new MySQL);
$user = Auth::check();  // Get userid from Auth::check() - session

$name = $_FILES["photo"]["name"];
$type = $_FILES["photo"]["type"];
$tmp = $_FILES["photo"]["tmp_name"];

// Check photo
if ($type == "image/jpeg" or $type == "image/png") {
    // give photo name as constant => for update photo feature
    // move_uploaded_file( $tmp, "photos/profile.jpg");

    // Save photo in database
    move_uploaded_file($tmp,"photos/$name");
    // Save photo in session - session refresh
    $table->updatePhoto($name, $user->id);
    $user->photo = $name;

    // header("location: ../profile.php");
    HTTP::redirect("/profile.php");
}
else {
    // header("location: ../profile.php?error=type");
    HTTP::redirect("/profile.php","error=type");
}
