<?php
include 'confeg.php';

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
    } else {
        // only letters (both upper case and lower case) 
        $namePattern = '/^[a-zA-Z]+$/';
        // splits the $full_name string into  (sections) based on 1+ whitespace
        $sections = preg_split('/\s+/', $Full_name);
        if (count($sections) !== 4) {
            $errors[] = "Full name must be in 4 sections: first name, middle name, last name, and family name.";
        } else {
            foreach ($sections as $section) {
                if (!preg_match($namePattern, $section)) {
                    $errors[] = "Each part of the full name must contain only letters.";
                    break;
                }
            }
        }
    }

    // Validate mobile number
    if (empty($mobile)) {
        $errors[] = "Mobile number is required.";
    } elseif (!preg_match('/^\d{10}$/', $mobile)) {
        $errors[] = "Mobile number must be 10 digits.";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        $errors[] = "Password must be at least 8 characters long, contain upper case, lower case, numbers, and special characters, and have no spaces.";
    }

    // Validate confirm password
    if (empty($confirm_password)) {
        $errors[] = "Confirm Password is required.";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // the pic :E
    $profile_picture = null;
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
        $fileName = $_FILES['profile_picture']['name'];
        $uploadFileDir = './uploaded_pictures/';
        $dest_path = $uploadFileDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $profile_picture = $fileName;
        } else {
            echo 'There was an error moving the uploaded file.';
            exit;
        }
    } else {
        echo 'File upload error: ' . $_FILES['profile_picture']['error'];
        exit;
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (Full_name , email, mobile, password,profile_picture ,role_id ) VALUES (? ,?, ?,?,?, 1)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sssss", $Full_name, $email, $mobile, $hashed_password, $profile_picture);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
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
    <title>Registration page</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

    <div class="container">
        <h2>Register</h2>
        <form method="post" action="register.php" id="myForm" enctype="multipart/form-data">
            <?php if (!empty($errors)) : ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <input type="text" name="Full_name" placeholder="Full Name" id="Full_name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="number" name="mobile" placeholder="mobile" id="mobile" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture"><br>
            <input type="submit" value="Register">
        </form>
    </div>.

    <script src="validation.js"></script>

</body>

</html>