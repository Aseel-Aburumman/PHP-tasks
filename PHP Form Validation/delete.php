<?php
include 'confeg.php';
session_start();

if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 2) {
    echo "Access denied.";
    exit();
}

$user_id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM users WHERE users_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo "User deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Delete User</h1>
        <p>Are you sure you want to delete this user?</p>
        <form method="post" action="delete.php?id=<?php echo $user_id; ?>">
            <input type="submit" value="Yes, delete">
        </form>
        <a href="admin_page.php">Cancel</a>
    </div>
</body>

</html>