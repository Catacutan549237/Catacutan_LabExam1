<?php

class Database {

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "lab_exam";

    private $conn;

    public function __construct() {
        $this->connect();

    }

    public function connect() {
    try {
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection error: " . $e->getMessage();
        $this->conn = null; 
    }
}

    public function getConnection() {

        return $this->conn;

    }

}

?>