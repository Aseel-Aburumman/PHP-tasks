<?php
include 'confeg.php';
session_start();

if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 2) {
    echo "Access denied.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Full_name = trim($_POST["Full_name"]);
    $email = trim($_POST["email"]);
    $mobile = trim($_POST["mobile"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);
    $errors = [];

    // Validate email
    if (empty($Full_name)) {
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

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
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

            if (move_uploaded_file($profile_picture['tmp_name'], $uploadFile)) {
                // File successfully uploaded
            } else {
                $errors[] = "Failed to upload profile picture.";
            }
        } else {
            $profile_picture_name = null;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (Full_name, email, mobile, password, profile_picture, role_id) VALUES (?, ?, ?, ?, ?, 1)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $Full_name, $email, $mobile, $hashed_password, $profile_picture_name);

        if ($stmt->execute()) {
            echo "User created successfully!";
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Create User</h1>
        <form method="post" action="create.php" enctype="multipart/form-data">
            <input type="text" name="Full_name" placeholder="Full Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="mobile" placeholder="Mobile" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture"><br>
            <input type="submit" value="Create">
        </form>
    </div>
</body>

</html>