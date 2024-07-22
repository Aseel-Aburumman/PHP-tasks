<?php
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
</body>

</html>