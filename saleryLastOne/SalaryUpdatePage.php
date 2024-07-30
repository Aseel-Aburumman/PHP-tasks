<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $amount = floatval($_POST["amount"]);
    $operation = $_POST["operation"];
    $employee_id = intval($_POST["employee_id"]);
    $all_employees = isset($_POST["all_employees"]);

    // Determine the SQL update statement based on the operation and target
    if ($all_employees) {
        if ($operation == "increase") {
            $update_sql = "UPDATE employees SET Original_salary = Original_salary + $amount";
        } else if ($operation == "decrease") {
            $update_sql = "UPDATE employees SET Original_salary = Original_salary - $amount";
        }
    } else {
        if ($operation == "increase") {
            $update_sql = "UPDATE employees SET Original_salary = Original_salary + $amount WHERE id = $employee_id";
        } else if ($operation == "decrease") {
            $update_sql = "UPDATE employees SET Original_salary = Original_salary - $amount WHERE id = $employee_id";
        }
    }

    if ($conn->query($update_sql) === TRUE) {
        echo "Salaries updated successfully";
    } else {
        echo "Error updating salaries: " . $conn->error;
    }
    $conn->close();
} else {
    echo '<!DOCTYPE html>
<html>
<head>
    <title>Salary Update Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #34495e;
        }
        h1, h2 {
            text-align: center;
            color: #e74c3c;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="number"], select {
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
            background-color: #27ae60;
            color: white;
        }
        .btn-cancel {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Employees Information</h1>
        <h2>Update Salary</h2>
        <p>Update the salary (increase or decrease) for a specific employee or for all employees.</p>
        <form method="post" action="SalaryUpdatePage.php">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" step="0.01" required><br>
            <label for="operation">Operation:</label>
            <select name="operation" required>
                <option value="increase">Increase</option>
                <option value="decrease">Decrease</option>
            </select><br>
            <label for="employee_id">Employee ID:</label>
            <input type="number" name="employee_id"><br>
            <label for="all_employees">
                <input type="checkbox" name="all_employees" value="1"> All employees
            </label><br>
            <div class="btn-container">
                <input type="submit" name="update" value="Update" class="btn btn-update">
                <input type="button" value="Cancel" class="btn btn-cancel" onclick="window.location=\'index.php\'">
            </div>
        </form>
    </div>
</body>
</html>';
}
