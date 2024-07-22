<?php
include 'confeg.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $errors = [];

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {

        $sql = "SELECT users_id , Full_name ,mobile ,password ,role_id FROM users WHERE email = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // if there is at least one row returned by the previous query. This means the user with the provided email exists.
        if ($stmt->num_rows > 0) {
            session_start();
            $stmt->bind_result($users_id, $Full_name, $mobile, $hashed_password, $role_id);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION["users_id"] = $users_id;
                $_SESSION["Full_name"] = $Full_name;
                $_SESSION["role_id"] = $role_id;
                $_SESSION["email"] = $email;
                $_SESSION["mobile"] = $mobile;




                // Check the role_id and redirect accordingly
                if ($role_id == 1) {
                    header("Location: user_page.php");
                    exit();
                } elseif ($role_id == 2) {
                    header("Location: admin_page.php");
                    exit();
                }
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found with that email address.";
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
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="login.php">
            <?php if (!empty($errors)) : ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>