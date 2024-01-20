<?php

// Step 6 - register

include("../vendor/autoload.php");

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

// create UsersTable obj
$table = new UsersTable(new MySQL);

// write insert()
$table->insert([
    // get data from register form which user filled in
    // column name in database table => data from user input
    "name" => $_POST["name"],
    "email" => $_POST["email"],
    "phone" => $_POST["phone"],
    "address" => $_POST["address"],
    "password"=> $_POST["password"],
]);

// if successful, redirect to index page
    // second parameter => for developer's note
HTTP::redirect("/index.php", "register=success");