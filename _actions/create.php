<?php

include("../vendor/autoload.php");

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

// create UsersTable obj
$table = new UsersTable(new MySQL);

// write insert()
$table->insert([
    // get data from register form which user filled in
    "name" => $_POST["name"],
    "email" => $_POST["email"],
    "phone" => $_POST["phone"],
    "address" => $_POST["address"],
    "password"=> $_POST["password"],
]);

// if successful, redirect to index page
HTTP::redirect("/index.php", "register=success");