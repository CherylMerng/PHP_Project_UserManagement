<?php

include("vendor/autoload.php");

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

