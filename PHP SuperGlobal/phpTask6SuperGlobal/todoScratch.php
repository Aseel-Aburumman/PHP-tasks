<?php
session_start();

$todoErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["todo"])) {
    $todoErr = "comon , write anything";
  } else {
    $todoItem = $_POST["todo"];
    if (!isset($_SESSION['todos'])) {
      $_SESSION['todos'] = array();
    }
    array_push($_SESSION['todos'], $todoItem); // Add the item to the session array
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    .error {
      color: #FF0000;
    }
  </style>
</head>

<body>
  <form action="" method="POST">
    <label for="todo">My to do list:</label>
    <input type="text" name="todo" id="todo" />
    <span class="error">*
      <?php echo $todoErr; ?>
    </span>
    <br /><br />
    <input type="submit" />
  </form>

  <?php
  echo "<h2>TO DO LIST:</h2>";
  if (isset($_SESSION['todos'])) {
    foreach ($_SESSION['todos'] as $item) {
      echo $item . "<br>";
    }
  }
  ?>
</body>

</html>