<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "salery_php_last_one_aseel";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}
