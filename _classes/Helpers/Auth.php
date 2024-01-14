<?php 

namespace Helpers;

class Auth 
{
    static function check() 
    {
        session_start();
        if (isset($_SESSION['user'])) { // check if user is in session
            return $_SESSION['user'];
        }

        // use redirect() written in HTTP.php
            // if not, redirect to index page (login page)
        HTTP::redirect('/index.php', 'auth=fail');
    }

    static function testcheck() {
        echo "Auth Check <br>";
    }

}

// To use check()
// Auth::check()