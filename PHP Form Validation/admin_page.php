<?php
include 'confeg.php';

session_start();
if ($_SESSION['role_id'] == null) {
    echo "whaa_a_t are u ? who are u ? GeT OUT";
} elseif ($_SESSION['role_id'] == 1) {
    header("Location: user_page.php");
} elseif ($_SESSION['role_id'] == 2) {

    echo "hi   ", "<br />";
    echo "User name:", $_SESSION['Full_name'], "<br />";
    echo "User role:", $_SESSION['role_id'], "<br />";
}


$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if (isset($_POST['button1'])) {
    session_destroy();
    echo "This is Button1 that is selected";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
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
        <h1>Users Details</h1>
        <a href="create.php" class="btn">+ Add New Users</a>
        <table>
            <tr>
                <th>#</th>
                <th>User image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date created</th>
                <th>Phone number</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['users_id']; ?></td>
                    <td><?php echo $row['profile_picture']; ?></td>
                    <td><?php echo $row['Full_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['Date_created']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td>
                        <a href="read.php?id=<?php echo $row['users_id']; ?>">Read</a>
                        <a href="update.php?id=<?php echo $row['users_id']; ?>">Update</a>
                        <a href="delete.php?id=<?php echo $row['users_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <!-- <form method="post">
            <input type="submit" name="button1" value="Button1" />
        </form> -->
    </div>

</body>

</html>