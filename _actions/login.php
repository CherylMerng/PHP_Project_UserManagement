<?php

session_start();

$email = $_POST["email"];   
$password = $_POST["password"]; 

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