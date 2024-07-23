<?php
include 'confeg.php';

session_start();
if (!isset($_SESSION['role_id'])) {
    echo "whaa_a_t are u ? who are u ? GeT OUT";
    exit();
} elseif ($_SESSION['role_id'] == 1) {
    header("Location: user_page.php");
    exit();
} elseif ($_SESSION['role_id'] == 2) {
    echo "hi ", "<br />";
    echo "User name: ", $_SESSION['Full_name'], "<br />";
    echo "User role: ", $_SESSION['role_id'], "<br />";
}

// Fetch all users from the database
$sql = "SELECT users_id, profile_picture, Full_name, email, Date_created, mobile FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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

        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color: #e74c3c;
            text-decoration: none;
            border-radius: 5px;
            float: right;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .action-icons a {
            margin: 0 5px;
            color: #e67e22;
            text-decoration: none;
        }

        .action-icons a:hover {
            color: #d35400;
        }

        img.profile-picture {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="logout.php" class="logout-btn">Logout</a>
        <h1>Users Details</h1>
        <a href="create.php" class="btn">+ Add New Users</a>
        <table>
            <tr>
                <th>#</th>
                <th>User Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['users_id']; ?></td>
                    <td><img src="<?php echo htmlspecialchars($row['profile_picture']); ?>" alt="Profile Picture" class="profile-picture"></td>
                    <td><?php echo htmlspecialchars($row['Full_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['Date_created']); ?></td>
                    <td><?php echo htmlspecialchars($row['mobile']); ?></td>
                    <td class="action-icons">
                        <a href="read.php?id=<?php echo $row['users_id']; ?>">Read</a>
                        <a href="update.php?id=<?php echo $row['users_id']; ?>">Update</a>
                        <a href="delete.php?id=<?php echo $row['users_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>