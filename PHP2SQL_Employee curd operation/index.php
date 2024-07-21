<?php
include 'config.php';

$sql = "SELECT * FROM Employees";
// Prepares an SQL statement
$stmt = $conn->prepare($sql);
// نفذ الامر 
$stmt->execute();
// جيب النتائج بعد ما نفذنا الامر الي فوق 
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Associative Arrays -->
<!-- Array
(
    [0] => Array
        (
            [id] => 1
            [name] =>mmmmm
            [salary] => vxvvd
        )
)
 -->
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Employees Details</h1>
        <a href="create.php" class="btn">+ Add New Employee</a>
        <table>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
            <?php foreach ($employees as $index => $employee) : ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $employee['Name']; ?></td>
                    <td><?php echo $employee['Address']; ?></td>
                    <td><?php echo $employee['Salary']; ?></td>
                    <td class="action-icons">
                        <!-- https://www.compart.com/en/unicode/U+1F441 -->
                        <a href="read.php?id=<?php echo $employee['id']; ?>">&#128065;</a>
                        <a href="update.php?id=<?php echo $employee['id']; ?>">&#9998;</a>
                        <a href="delete.php?id=<?php echo $employee['id']; ?>">&#128465;</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>