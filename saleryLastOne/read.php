<?php
include 'config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM employees WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "ID: " . $row["id"] . "<br>";
    echo "Name: " . $row["name"] . "<br>";
    echo "Address: " . $row["Original_salary"] . "<br>";
    echo "Salary: " . $row["days_taken_off"] . "<br>";
    echo "Salary: " . $row["actual_salary"] . "<br>";
} else {
    echo "No employee found with ID: $id";
}
$conn->close();
