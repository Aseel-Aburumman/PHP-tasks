<?php
include 'confeg.php';
session_start();

if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 2) {
    echo "Access denied.";
    exit();
}

$user_id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Full_name = trim($_POST["Full_name"]);
    $email = trim($_POST["email"]);
    $mobile = trim($_POST["mobile"]);
    $errors = [];

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate FULL NAME
    if (empty($Full_name)) {
        $errors[] = "Full Name is required.";
    }

    // Validate mobile number
    if (empty($mobile)) {
        $errors[] = "Mobile number is required.";
    }

    // Validate profile picture
    $profile_picture = $_FILES['profile_picture'];
    if ($profile_picture['error'] != UPLOAD_ERR_NO_FILE) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($profile_picture['type'], $allowedTypes)) {
            $errors[] = "Only JPG, PNG, and GIF files are allowed.";
        }
    }

    if (empty($errors)) {
        // Handle file upload
        if ($profile_picture['error'] != UPLOAD_ERR_NO_FILE) {
            $uploadDir = 'uploaded_pictures/';
            $profile_picture_name = basename($profile_picture['name']);
            $uploadFile = $uploadDir . $profile_picture_name;

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($profile_picture['tmp_name'], $uploadFile)) {
                // File successfully uploaded
            } else {
                $errors[] = "Failed to upload profile picture.";
            }
        } else {
            // If no new picture is uploaded, keep the current one
            $uploadFile = $_POST['current_picture'];
        }

        $sql = "UPDATE users SET Full_name = ?, email = ?, mobile = ?, profile_picture = ? WHERE users_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $Full_name, $email, $mobile, $uploadFile, $user_id);

        if ($stmt->execute()) {
            echo "Update successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
        exit();
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
} else {
    $sql = "SELECT Full_name, email, mobile, profile_picture FROM users WHERE users_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($Full_name, $email, $mobile, $profile_picture);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Update User</h1>
        <form method="post" action="update.php?id=<?php echo $user_id; ?>" enctype="multipart/form-data">
            <input type="text" name="Full_name" placeholder="Full Name" value="<?php echo htmlspecialchars($Full_name); ?>" required><br>
            <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required><br>
            <input type="text" name="mobile" placeholder="Mobile" value="<?php echo htmlspecialchars($mobile); ?>" required><br>
            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture"><br>
            <input type="hidden" name="current_picture" value="<?php echo htmlspecialchars($profile_picture); ?>"><br>
            <?php if ($profile_picture) : ?>
                <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" style="width:150px;height:150px;"><br>
            <?php endif; ?>
            <input type="submit" value="Update">
        </form>
    </div>
</body>

</html>