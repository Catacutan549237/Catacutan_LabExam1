<?php

require_once 'Student_Records.php';
$records = new Student_Records();
$students = $records->readAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT RECORDS</title>
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
        table {
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th, td {
            border: 1px solid #ddd; 
            padding: 8px; 
            text-align: left; 
        }
        th {
            background-color: #547d4aff; 
            color: white; 
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }
    </style>
</head>
<body>
    <h2>Student Records</h2>
    <a href="create.php" class="btn">Add New Student</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?=$student['id']; ?></td>
                <td><?=$student['id_number']; ?></td>
                <td><?=$student['name']; ?></td>
                <td><?=$student['email']; ?></td>
                <td><?=$student['course']; ?></td>
                <td>
                    <a href="edit.php?id=<?=$student['id']; ?>" class="btn">Edit</a>
                    <a href="delete.php?id=<?=$student['id']; ?>" class="btn" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>