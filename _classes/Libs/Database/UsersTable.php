<?php

namespace Libs\Database;

use PDOException;

class UsersTable 
{
    private $db;

    public function __construct(MySQL $mysql) {
        $this->db = $mysql->connect();
    }

    public function getAll() {
        $statement = $this->db->query(
            "SELECT users.*, roles.name AS role
             FROM users LEFT JOIN roles
             ON users.role_id = roles.id"
        );
        return $statement->fetchAll();
    }

    // write find() for finding user’s email and password
    public function find($email, $password) {
        try {
            // select query
            $statement = $this->db->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
            $statement->execute(["email" => $email,"password"=> $password]);
            // fetch data
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

    public function updatePhoto($photo, $id) {
        try {
            $statement = $this->db->prepare("UPDATE users SET photo=:photo WHERE id=:id");
            $statement->execute(['photo' => $photo,'id'=> $id]);

            return $statement->rowCount();
        }
        catch (PDOException $e) {
            echo $e->getMessage();  
            exit();
        }
    }
}