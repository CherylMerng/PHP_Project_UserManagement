<?php

namespace Libs\Database;

use PDOException;

class UsersTable 
{
    private $db;

    public function __construct(MySQL $mysql) {
        $this->db = $mysql->connect();
    }

    // write find() for finding user’s email and password
        // select query
        // fetch data
    public function find($email, $password) {
        try {
            $statement = $this->db->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
            $statement->execute(["email" => $email,"password"=> $password]);
            $user = $statement->fetch();

            return $user ?? false;  // ?? => if else
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function insert($data) 
    {
        try {
            $statement = $this->db->prepare(
                "INSERT INTO users (name, email, phone, address, password, created_at) VALUES (:name, :email, :phone, :address, :password, NOW())"
            );
            $statement->execute($data);

            // need to know to identity record
            return $this->db->lastInsertId();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}