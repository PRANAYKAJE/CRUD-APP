<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];

    $stmt = $pdo->prepare('INSERT INTO teachers (name, age, phone, subject) VALUES (?, ?, ?, ?)');
    $stmt->execute([$name, $age, $phone, $subject]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Teacher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

</head>
<body>
    <h1 class="bg-dark text-light text-center">Add New Teacher</h1>
    <form method="POST" class="form-control">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        
        <label>Age:</label><br>
        <input type="number" name="age" required><br><br>
        
        <label>Phone Number:</label><br>
        <input type="text" name="phone" required><br><br>
        
        <label>Subject:</label><br>
        <input type="text" name="subject" required><br><br>
        
        <button type="submit" class="btn btn-primary">Add Teacher</button>
    </form>
</body>
</html>
