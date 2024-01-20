<?php 

// Step 5 - helpers

namespace Helpers;

class HTTP 
{
    static $base = "http://localhost/ft/web_pro_backend/user-management_project";

    // static method, accept $path & $query as parameters, and redirect to another page
    static function redirect($path, $q = '') // $q => default
    {
        // combine base url with path
        $url = static::$base . $path;

        // combine url with $q parameter, $q => query. So, put ?
        if ($q) $url .= "?$q";

        // header => redirect
        header("location: $url");
        exit();
    }
}

// To use redirect(),
// HTTP::redirect('/url', 'query=value');