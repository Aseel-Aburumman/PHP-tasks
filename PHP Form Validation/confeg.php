<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_validation_aseel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "hi asool :3 you are connected to the database  ";
}
