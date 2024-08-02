<?php
require_once 'config.php';

$stmt = $pdo->query('SELECT * FROM teachers');
$teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teachers CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center bg-dark text-light">Teachers List</h1>
    <a href="add_teacher.php"><button class="btn btn-primary">Add New Teacher</button></a>
    <table border="1" class="table table-hover table-bordered table-striped">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Phone Number</th>
            <th>Subject</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($teachers as $teacher): ?>
            <tr>
                <td><?php echo $teacher['name']; ?></td>
                <td><?php echo $teacher['age']; ?></td>
                <td><?php echo $teacher['phone']; ?></td>
                <td><?php echo $teacher['subject']; ?></td>
                <td>
                    <a href="edit_teacher.php?id=<?php echo $teacher['id']; ?>"><button class="btn btn-primary">Edit</button></a>
                    <a href="delete_teacher.php?id=<?php echo $teacher['id']; ?>" onclick="return confirm('Are you sure you want to delete this teacher?')">
                    <button class="btn btn-primary">Delete</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
