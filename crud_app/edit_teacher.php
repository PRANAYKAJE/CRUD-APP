<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];

    $stmt = $pdo->prepare('UPDATE teachers SET name=?, age=?, phone=?, subject=? WHERE id=?');
    $stmt->execute([$name, $age, $phone, $subject, $id]);

    header('Location: index.php');
    exit();
}

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit();
}

$stmt = $pdo->prepare('SELECT * FROM teachers WHERE id=?');
$stmt->execute([$id]);
$teacher = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="bg-dark text-center text-light">Edit Teacher</h1>
    <form method="POST" class="form-control">
        <input type="hidden" name="id" value="<?php echo $teacher['id']; ?>">
        
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $teacher['name']; ?>" required><br><br>
        
        <label>Age:</label><br>
        <input type="number" name="age" value="<?php echo $teacher['age']; ?>" required><br><br>
        
        <label>Phone Number:</label><br>
        <input type="text" name="phone" value="<?php echo $teacher['phone']; ?>" required><br><br>
        
        <label>Subject:</label><br>
        <input type="text" name="subject" value="<?php echo $teacher['subject']; ?>" required><br><br>
        
        <button type="submit" class="btn btn-primary">Update Teacher</button>
    </form>
</body>
</html>
