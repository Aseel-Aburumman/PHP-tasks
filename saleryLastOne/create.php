<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO Employees (Name, Address, Salary) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $address, $salary]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Employee</title>
</head>

<body>
    <h1>Add Employee</h1>
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>
        <label>Address:</label><br>
        <input type="text" name="address" required><br>
        <label>Salary:</label><br>
        <input type="number" step="0.01" name="salary" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <a href="index.php">Back to Employee List</a>
</body>

</html>