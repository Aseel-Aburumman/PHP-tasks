<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Employee Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        h1 {
            color: #e67e22;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color: #e67e22;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #d35400;
        }

        .action-icons a {
            margin: 0 5px;
            color: #e67e22;
            text-decoration: none;
        }

        .action-icons a:hover {
            color: #d35400;
        }

        .cards_container {
            display: flex;
            height: 30vh;
            background-color: #e67e22;
            text-align: center;
        }

        .card {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Dashboard</h1>
        <div class="cards_container">
            <div class="card">
                <h4>Max salary</h4>
                <?php
                $sqlMax = "SELECT name, original_salary 
                            FROM employees 
                            WHERE original_salary = (SELECT MAX(original_salary) FROM employees)";
                $result = $conn->query($sqlMax);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['name'];
                    echo "<br>";
                    echo $row['original_salary'];
                } else {
                    echo "No data found";
                }
                ?>
            </div>
            <div class="card">
                <h4>Min salary</h4>
                <?php
                $sqlMin = "SELECT name, original_salary 
                            FROM employees 
                            WHERE original_salary = (SELECT MIN(original_salary) FROM employees)";
                $result = $conn->query($sqlMin);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['name'];
                    echo "<br>";
                    echo $row['original_salary'];
                } else {
                    echo "No data found";
                }
                ?>
            </div>
            <div class="card">
                <h4>Sum salary</h4>
                <?php
                $sqlSum = "SELECT SUM(original_salary) AS SUM_SALARY FROM employees";
                $result = $conn->query($sqlSum);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['SUM_SALARY'];
                } else {
                    echo "No data found";
                }
                ?>
            </div>
            <div class="card">
                <h4>Number of employees</h4>
                <?php
                $sqlCount = "SELECT COUNT(original_salary) AS count_employee FROM employees";
                $result = $conn->query($sqlCount);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['count_employee'];
                } else {
                    echo "No data found";
                }
                ?>
            </div>
        </div>
        <h1>Employees Details</h1>
        <a href="SalaryUpdatePage.php" class="btn">Salary Update Page</a>
        <a href="Search.php" class="btn">Search</a>

        <table>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Original_salary</th>
                <th>days_taken_off</th>
                <th>actual_salary</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM employees";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["Original_salary"] . "</td>";
                    echo "<td>" . $row["days_taken_off"] . "</td>";
                    echo "<td>" . $row["actual_salary"] . "</td>";
                    echo '<td><a href="read.php?id=' . $row["id"] . '">View</a> | <a href="update.php?id=' . $row["id"] . '">Update</a> | <a href="delete.php?id=' . $row["id"] . '">Delete</a></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No employees found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>

</html>