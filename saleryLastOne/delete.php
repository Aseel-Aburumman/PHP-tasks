<?php
include 'config.php';
$id = $_GET['id'];

$sql = "DELETE FROM employees WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header("Location: index.php");
