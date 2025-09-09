<?php

require_once 'database.php';
class Student_Records {
    private $conn;
    private $table = 'tbl_student';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection(); 
    }

    public function create($id_number, $name, $email, $course) {
        if ($this->conn) { 
            $sql = "INSERT INTO " . $this->table . " (id_number, name, email, course) VALUES (:id_number, :name, :email, :course)";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                'id_number' => $id_number,
                'name' => $name,
                'email' => $email,
                'course' => $course
            ]);
        } else {
            echo "Database connection is not established.";
            return false;
        }
    }


    public function readAll() {
        $sql = "SELECT id_number, name, email, course FROM $this->table";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $id_number, $name, $email, $course) {
        $sql = "UPDATE " . $this->table . " SET id_number = :id_number, name = :name, email = :email, course = :course WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            "id_number" => $id_number,
            "name" => $name,
            "email" => $email,
            "course" => $course,
            "id" => $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(["id" => $id]);
    }
}

?>
