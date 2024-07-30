<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Search Employees</title>
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

        .search-box {
            margin-top: 20px;
        }

        .search-box input[type="text"] {
            width: 80%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-box input[type="submit"] {
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color: #e67e22;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-box input[type="submit"]:hover {
            background-color: #d35400;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Search Employees</h1>
        <div class="search-box">
            <form method="GET" action="Search.php">
                <input type="text" name="query" placeholder="Enter employee name or ID" required>
                <input type="submit" value="Search">
            </form>
        </div>
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
            if (isset($_GET['query'])) {
                $query = $conn->real_escape_string($_GET['query']);
                $sql = "SELECT * FROM employees WHERE name LIKE '%$query%' OR id LIKE '%$query%'";
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
                    echo "<tr><td colspan='6'>No employees found</td></tr>";
                }
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>

</html>