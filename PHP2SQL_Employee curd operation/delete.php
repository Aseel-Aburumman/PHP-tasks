<?php
include 'config.php';
$id = $_GET['id'];

$sql = "DELETE FROM Employees WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header("Location: index.php");
