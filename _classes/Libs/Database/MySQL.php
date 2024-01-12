<?php

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

    public function __construct($dbhost = "localhost", $dbname = "project", $dbuser = "cheryl", $dbpass = "cheryl123") {
        
        // Close database connection (return null for db in PDO object)
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
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]
            );

            return $this->db;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}