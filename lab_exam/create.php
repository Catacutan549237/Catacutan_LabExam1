<?php
require_once 'Student_Records.php'; 
$records = new Student_Records(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_number = $_POST['id_number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    if ($records->create($id_number, $name, $email, $course)) {
        echo "Student created successfully.";
        header("Location: index.php");
    } else {
        echo "Failed to create student.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE STUDENT</title>
    <style>
        body {
            background-color: #f0f0f0; 
            color: #333; 
            margin: 20px; 
            text-align: center; 
        }
        h2 {
            color: #333; 
        }
        .btn {
            padding: 8px 12px; 
            background-color: #547d4aff; 
            color: white; 
            border: none; 
            border-radius: 3px; 
            margin: 5px; 
        }
        input {
            display: block; 
            margin: 10px auto; 
            padding: 8px; 
            width: 200px; 
            border: 1px solid #ddd; 
            border-radius: 3px; 
        }
    </style>
</head>
<body>
    <h2>Add New Student</h2>
    <form method="POST">
        <input type="text" name="id_number" placeholder="ID Number" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="course" placeholder="Course" required>
        <button type="submit" class="btn">Create</button>
        <a href="index.php" class="btn">Back to Records</a>
    </form>
</body>
</html>