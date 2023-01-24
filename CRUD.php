<?php

// This is a simple CRUD class that demonstrates how to use PHP to interact with a MySQL database.

class CRUD {
  
    // Connect to the database
    private $conn;
    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
  
    // Create a new record
    public function create($table, $fields, $values) {
        try {
            $query = "INSERT INTO $table ($fields) VALUES ($values)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Insert failed: " . $e->getMessage();
            return false;
        }
    }
  
    // Read a single record
    public function read($table, $id) {
        try {
            $query = "SELECT * FROM $table WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Select failed: " . $e->getMessage();
            return false;
        }
    }
  
    // Read all records
    public function readAll($table) {
        try {
            $query = "SELECT * FROM $table";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Select all failed: " . $e->getMessage();
            return false;
        }
    }
  
    // Update a record 
    public function update($table, $fields, $values, $id) {
        try {
            $query = "UPDATE $table SET $fields = $values WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Update failed: " . $e->getMessage();
            return false;
        }
    }
  
    // Delete a record  
    public function delete($table, $id) {
        try {
            $query = "DELETE FROM $table WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Delete failed: " . $e->getMessage();
            return false;
        }
    }
}
