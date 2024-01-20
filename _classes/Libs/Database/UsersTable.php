<?php

namespace Libs\Database;

use PDOException;

class UsersTable 
{
    // Step 4 start
    private $db;

    public function __construct(MySQL $mysql) {
        $this->db = $mysql->connect();
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
    // Step 4 end

    // Step 9 - admin/ user management
    // get all records
    // * => all columns
    public function getAll() {
        $statement = $this->db->query(
            "SELECT users.*, roles.name AS role
             FROM users LEFT JOIN roles
             ON users.role_id = roles.id"
        );
        return $statement->fetchAll();
    }

    // Step 7 - login
    // write find() for finding user’s email and password
    public function find($email, $password) {
        try {
            // select query (prepare + execute)
                // run query only one time & prevent SQL Injection
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

    // Step 8 - profile photo
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

    // Step 10 - delete user
    public function delete($id) {
        try {
            $statement = $this->db->prepare("DELETE FROM users WHERE id = :id");
            $statement->execute(["id" => $id]);

            return $statement->rowCount();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    // Step 11 - suspend & unsuspend user
    public function suspend($id) {
        try {
            $statement = $this->db->prepare("UPDATE users SET suspended=1 WHERE id=:id");
            $statement->execute(["id" => $id]);

            return $statement->rowCount();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function unsuspend($id) {
        try {
            $statement = $this->db->prepare("UPDATE users SET suspended=0 WHERE id=:id"); 
            $statement->execute(["id" => $id]);

            return $statement->rowCount();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    // Step 12 - change role
    public function changeRole($id, $role_id) {
        try {
            $statement = $this->db->prepare("UPDATE users SET role_id=:role_id WHERE id=:id");
            $statement->execute(["id" => $id, "role_id" => $role_id]);

            return $statement->rowCount();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

}