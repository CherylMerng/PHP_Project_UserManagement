<?php

$type = $_FILES["photo"]["type"];
$tmp = $_FILES["photo"]["tmp_name"];

if ($type == "image/jpeg" or $type == "image/png") {
    // give photo name as constant => for update photo feature
    move_uploaded_file( $tmp, "photos/profile.jpg");
    header("location: ../profile.php");
}
else {
    header("location: ../profile.php?error=type");
}
