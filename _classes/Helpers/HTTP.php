<?php 

namespace Helpers;

class HTTP 
{
    static $base = "http://localhost/ft/web_pro_backend/user-management_project";

    static function redirect($path, $q = '') // $q => default
    {
        // combine base url & path
        $url = static::$base . $path;

        // combine with $q parameter // what is ?$q
        if ($q) $url .= "?$q";

        // header => redirect
        header("location: $url");
        exit();
    }
}

// To use redirect(),
// HTTP::redirect('/url', 'query=value');