<?php
require 'config.php';

// Validate and sanitize the id parameter
$idd = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idd > 0) {
    $sql = "SELECT * FROM employees WHERE id=$idd";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No employee found";
        exit;
    }
} else {
    echo "Invalid employee ID";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = intval($_POST["id"]);
    $name = $conn->real_escape_string($_POST["name"]);
    $salary = floatval($_POST["salary"]);
    $daysoff = intval($_POST["days_taken_off"]);

    $update_sql = "UPDATE employees SET name='$name', Original_salary='$salary', days_taken_off='$daysoff' WHERE id=$id";
    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
} else {
    echo '<!DOCTYPE html>
<html>
<head>
    <title>Update Salary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        h1, h2 {
            text-align: center;
            color: #e67e22;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-container {
            text-align: center;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-update {
            background-color: #e67e22;
            color: white;
        }
        .btn-cancel {
            background-color: #d9534f;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Employees Information</h1>
        <h2>Update Salary</h2>
        <form method="post" action="update.php?id=' . $row["id"] . '">
            <input type="hidden" name="id" value="' . $row["id"] . '">
            <label for="name">Name:</label>
            <input type="text" name="name" value="' . $row["name"] . '"><br>
            <label for="salary">Salary:</label>
            <input type="number" name="salary" value="' . $row["Original_salary"] . '"><br>
            <label for="days_taken_off">Days Taken Off:</label>
            <input type="number" name="days_taken_off" value="' . $row["days_taken_off"] . '"><br>
            <div class="btn-container">
                <input type="submit" name="update" value="Update" class="btn btn-update">
                <input type="button" value="Cancel" class="btn btn-cancel" onclick="window.location=\'index.php\'">
            </div>
        </form>
    </div>
</body>
</html>';
}
