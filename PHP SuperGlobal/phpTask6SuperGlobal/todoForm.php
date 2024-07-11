<?php
session_start();

// Initialize the task list if not already done
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Handle form submission to add a new task
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
    $task = htmlspecialchars($_POST['task']);
    $_SESSION['tasks'][] = $task;
}

// Handle task deletion
if (isset($_GET['delete'])) {
    $index = intval($_GET['delete']);
    if (isset($_SESSION['tasks'][$index])) {
        unset($_SESSION['tasks'][$index]);
        $_SESSION['tasks'] = array_values($_SESSION['tasks']); // Reindex array
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>To Do List</title>
</head>

<body>
    <h1>To Do List</h1>

    <!-- Form to add a new task -->
    <form method="post" action="">
        <input type="text" name="task" required>
        <button type="submit">Add Task</button>
    </form>

    <!-- Display the list of tasks -->
    <ul>
        <?php foreach ($_SESSION['tasks'] as $index => $task) : ?>
            <li>
                <?php echo $task; ?>
                <a href="?delete=<?php echo $index; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>