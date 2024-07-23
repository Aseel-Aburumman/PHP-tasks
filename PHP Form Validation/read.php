<?php
include 'confeg.php';
session_start();

if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 2) {
    echo "Access denied.";
    exit();
}

$user_id = $_GET['id'];
$sql = "SELECT Full_name, email, mobile, profile_picture, Date_created FROM users WHERE users_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($Full_name, $email, $mobile, $profile_picture, $Date_created);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>User Details</h1>
        <p>Full Name: <?php echo htmlspecialchars($Full_name); ?></p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <p>Mobile: <?php echo htmlspecialchars($mobile); ?></p>
        <p>Date Created: <?php echo htmlspecialchars($Date_created); ?></p>
        <?php if ($profile_picture) : ?>
            <p>Profile Picture: <img src="uploaded_pictures/<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" width="100" height="100"></p>
        <?php else : ?>
            <p>No profile picture available.</p>
        <?php endif; ?>
    </div>
</body>

</html>