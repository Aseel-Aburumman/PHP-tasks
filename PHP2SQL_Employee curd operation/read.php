<?php
include 'config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM Employees WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$employee = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <title>View Employee</title>
</head>

<body>
    <h1>View Employee</h1>
    <p>Name: <?php echo $employee['Name']; ?></p>
    <p>Address: <?php echo $employee['Address']; ?></p>
    <p>Salary: <?php echo $employee['Salary']; ?></p>
    <a href="index.php">Back to Employee List</a>
</body>

</html>