<?php
require_once 'Student_Records.php'; 
$records = new Student_Records(); 


$id = $_GET['id'] ?? null;
$data = $records->getById($id); 


if (!$data) {
    echo "No record found for ID: " . htmlspecialchars($id);
    exit; 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_number = $_POST['id_number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    if ($records->update($id, $id_number, $name, $email, $course)) {
        echo "Student updated successfully.";
        header("Location: index.php");
        exit; 
    } else {
        echo "Failed to update student.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT STUDENT</title>
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
    <h2>Edit Student Record</h2>
    <form method="POST">
        <input type="text" name="id_number" value="<?= htmlspecialchars($data['id_number']); ?>" placeholder="ID Number" required>
        <input type="text" name="name" value="<?= htmlspecialchars($data['name']); ?>" placeholder="Name" required>
        <input type="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" placeholder="Email" required>
        <input type="text" name="course" value="<?= htmlspecialchars($data['course']); ?>" placeholder="Course" required>
        <button type="submit" class="btn">Save</button>
        <a href="index.php" class="btn">Back to Records</a>
    </form>
</body>
</html>