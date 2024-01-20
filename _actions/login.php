<?php

// Step 7 - login
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

// email, password in $_POST - user input (name attributes from html form)
$email = $_POST["email"];   
$password = $_POST["password"]; 

// update codes by using MySQL, UsersTable, HTTP classes
    // Find user data in database. Only then, go to profile page. Or redirect to index page.
$table = new UsersTable(new MySQL);
$user = $table->find($email, $password);

if ($user) {

    // Step 11 - suspend & unsuspend user
    if ($user->suspended) {
        HTTP::redirect("/index.php", "suspended=user");
    }

    session_start();
    $_SESSION["user"] = $user;  // save user data in session
    HTTP::redirect("/profile.php");
}

// second parameter => for developer's note
HTTP::redirect("/index.php", "incorrect=login");

// Step 1 - old version with dummy data
/*
session_start();

// $email === username from DB, $password === password from DB
if ($email === "alice@gmail.com" and $password === "alice123") {
    
    // $_SESSION["user"] = ["name" => "value"];
    $_SESSION["user"] = ["username" => "Alice"];    // save as "user" data in session 

    header("location: ../profile.php");
    // exit();     // if write this, no need if-else
}
else {
    header("location: ../index.php?incorrect");
}
*/