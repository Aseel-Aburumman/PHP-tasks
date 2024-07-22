<?php
include 'confeg.php';

session_start();
if ($_SESSION['role_id'] == null) {
    echo "whaa_a_t are u ? who are u ? GeT OUT";
} elseif ($_SESSION['role_id'] == 1) {
    echo "hi   ", "<br />";
    echo "User name:", $_SESSION['Full_name'], "<br />";
    echo "User role:", $_SESSION['role_id'], "<br />";
} elseif ($_SESSION['role_id'] == 2) {
    header("Location: admin_page.php");
}


$user_id = $_SESSION['users_id'];

$sql = "SELECT Full_name, email, mobile, profile_picture FROM users WHERE users_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($Full_name, $email, $mobile, $profile_picture);
$stmt->fetch();
$stmt->close();
$conn->close();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <div class="container">
        <h1>hi <?php echo $_SESSION['Full_name']; ?></h1>
        <?php if ($profile_picture) : ?>
            <p>Profile Picture: <img src="uploaded_pictures/<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture"></p>
        <?php else : ?>
            <p>No profile picture available.</p>
        <?php endif; ?>
        <p>email <?php echo $_SESSION['email']; ?></p>
        <p>mobile <?php echo $_SESSION['mobile']; ?></p>
    </div>


</body>

</html>