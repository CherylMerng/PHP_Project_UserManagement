<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$email = $_POST["email"];   
$password = $_POST["password"]; 

// update codes by using MySQL, UsersTable, HTTP classes
$table = new UsersTable(new MySQL);
$user = $table->find($email, $password);

if ($user) {
    session_start();
    $_SESSION["user"] = $user;  
    HTTP::redirect("/profile.php");
}

HTTP::redirect("/index.php", "incorrect=login");

// old version - dummy data
/*
session_start();

// $email, $password - user input (name attribute from html form)
// $email === username from DB, $password === password from DB
if ($email === "alice@gmail.com" and $password === "alice123") {
    
    // save user data in session
    // $_SESSION["user"] = ["name" => "value"];
    $_SESSION["user"] = ["username" => "password"];

    header("location: ../profile.php");
    exit();     // if write this, no need if-else
}
else {
    header("location: ../index.php?incorrect");
}
*/