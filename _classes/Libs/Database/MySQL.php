<?php

// Step 4 - database
 
namespace Libs\Database;

use PDO;    // PDO is under global namespace
use PDOException;

class MySQL 
{
    private $db;
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;

    // constructor parameter property promotion
    /* public function __construct(private $dbhost = "localhost", private $dbname = "project", private $dbuser = "cheryl", private $dbpass = "cheryl123") {} */

    // if give default property value
    // $db2 = new MySQL("localhost", "project", "cheryl", "cheryl123"); [OR]
    // $db2 = new MySQL();

    public function __construct($dbhost = "localhost", $dbname = "project", $dbuser = "cheryl", $dbpass = "cheryl123") {
        
        // close database connection (return null for db in PDO object)
        $this->db = null;
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
    }

    public function connect() 
    {
        try {   
            $this->db = new PDO(
                "mysql:dbhost=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass,
                // 4th parameter => error mode and fetch mode
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]
            );

            return $this->db;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit(); // stop after showing error message
        }
    }
}

// To use MySQL.php in other class,
// MySQL $mysql
// $mysql->connect()