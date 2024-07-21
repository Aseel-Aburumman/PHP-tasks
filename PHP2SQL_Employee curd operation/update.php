<?php
include 'config.php';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "UPDATE Employees SET Name = ?, Address = ?, Salary = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $address, $salary, $id]);

    header("Location: index.php");
} else {
    $sql = "SELECT * FROM Employees WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Employee</title>
</head>

<body>
    <h1>Edit Employee</h1>
    <form method="post">
        <label>Name:</label><br>
        <!-- $employee = [
    'Name' => 'asool',
    'Address' => 'amman',
    'Salary' => 5000
]; -->
        <input type="text" name="name" value="<?php echo $employee['Name']; ?>" required><br>
        <label>Address:</label><br>
        <input type="text" name="address" value="<?php echo $employee['Address']; ?>" required><br>
        <label>Salary:</label><br>
        <input type="number" step="0.01" name="salary" value="<?php echo $employee['Salary']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to Employee List</a>
</body>

</html>