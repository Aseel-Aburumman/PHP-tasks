<?php
include 'confeg.php';

session_start();
if (!isset($_SESSION['role_id'])) {
    echo "Who are you? Get out!";
    exit();
} elseif ($_SESSION['role_id'] == 1) {
    // Fetch user information from the database
    $stmt = $conn->prepare("SELECT Full_name, email, mobile, profile_picture FROM users WHERE email = ?");
    $stmt->bind_param("s", $_SESSION['email']);  // Assuming email is stored in the session
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $fullName = htmlspecialchars($user['Full_name']);
        $email = htmlspecialchars($user['email']);
        $mobile = htmlspecialchars($user['mobile']);
        $profilePicture = htmlspecialchars($user['profile_picture']);
    } else {
        echo "User not found.";
        exit();
    }

    $stmt->close();
    $conn->close();
} elseif ($_SESSION['role_id'] == 2) {
    header("Location: admin_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <a href="logout.php" class="logout-btn">Logout</a>
        <h1>hi <?php echo $fullName; ?></h1>
        <p>Profile Picture:</p>
        <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" style="width:150px;height:150px;">
        <p>Email: <?php echo $email; ?></p>
        <p>Mobile: <?php echo $mobile; ?></p>
    </div>
</body>

</html>