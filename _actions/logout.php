<?php

// Step 1
session_start();
unset($_SESSION["user"]);   // delete session data/ value

header("location: ../index.php");

?>