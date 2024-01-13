<?php

include("vendor/autoload.php");

/*
use Faker\Factory as Faker;
use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$faker = Faker::create();
echo $faker -> word . $faker -> name . $faker -> email;
echo "<br>";

Auth::check();
HTTP::redirect();

// need to create object as not defined autoload setting
$db = new MySQL();
$db -> connect();

$table = new UsersTable;
$table -> insert();
*/

// Test MySQL.php
/*
include ("vendor/autoload.php");

use Libs\Database\MySQL;

$mysql = new MySQL();   
$db = $mysql->connect();
$result = $db->query("SELECT * FROM roles");

print_r($result->fetchAll());   
*/

// Test UsersTable.php 

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL());   // create object

// test insert()
/*
$id = $table->insert([
    "name" => "Alice",
    "email" => "alice@gmail.com",
    "phone" => "32802123",
    "address" => "Some Address",
    "password" => "password",
]);

echo $id;
*/

// test find()
/*
$user = $table->find("alice@gmail.com","password");
print_r($user); 
*/