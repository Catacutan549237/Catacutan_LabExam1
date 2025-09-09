<?php
require_once 'database.php';

if (isset($_GET['id'])) {
    
    $database = new Database();
    $db = $database->getConnection(); 
  
    if ($db) {
        $id = $_GET['id'];
        $stmt = $db->prepare("DELETE FROM tbl_student WHERE id = :id");
        $stmt->execute(['id' => $id]);
    } else {
        echo "Database connection failed.";
        exit; 
    }
}

header("Location: index.php");

?>