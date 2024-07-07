<!DOCTYPE html>
<html>

<head>
    <title>Simple Calculator</title>
</head>

<body>

    <h2>Simple Calculator</h2>
    <form method="post">
        <input type="number" name="num1" placeholder="Enter first number" required>
        <input type="number" name="num2" placeholder="Enter second number" required><br>

        <button type="submit" name="operation" value="add">Addition</button>
        <button type="submit" name="operation" value="subtract">Subtraction</button>
        <button type="submit" name="operation" value="multiply">Multiplication</button>
        <button type="submit" name="operation" value="divide">Division</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Array
        // (
        //     [num1] => 10
        //     [num2] => 5
        //     [operation] => add
        // )



        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];

        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                echo "<h3>Result: $num1 + $num2 = $result</h3>";
                break;
            case "subtract":
                $result = $num1 - $num2;
                echo "<h3>Result: $num1 - $num2 = $result</h3>";
                break;
            case "multiply":
                $result = $num1 * $num2;
                echo "<h3>Result: $num1 * $num2 = $result</h3>";
                break;
            case "divide":
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                    echo "<h3>Result: $num1 / $num2 = $result</h3>";
                } else {
                    echo "<h3>Cannot divide by zero</h3>";
                }
                break;
            default:
                echo "<h3>Invalid operation selected</h3>";
        }
    }
    ?>

</body>

</html>