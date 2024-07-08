<?php

echo '<h2>' . ("PHP basic tasks") . '<h2>';
echo '<h4>' . ("loops") . '<h4>';

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("1-") . '<h4>';
for ($i = 1; $i <= 10; $i++) {
    if ($i < 10) {
        echo $i . "-";
    } else {
        echo $i;
    }
}
echo "<br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("2-") . '<h4>';
$sum = 0;
for ($i = 0; $i <= 30; $i++) {
    $sum += $i;
}
echo "Total: $sum <br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("3-") . '<h4>';
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        if ($j <= (5 - $i)) {
            echo "A ";
        } else {
            echo chr(64 + $i) . " ";
        }
    }
    echo "<br>";
}

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("4-") . '<h4>';
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        if ($j <= (5 - $i)) {
            echo "1 ";
        } else {
            echo $i . " ";
        }
    }
    echo "<br>";
}

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("5-") . '<h4>';
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        if ($i == $j) {
            echo "$i ";
        } else {
            echo "0 ";
        }
    }
    echo "<br>";
}

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("6-") . '<h4>';
function factorial($num)
{
    $factorial = 1;
    for ($i = $num; $i > 0; $i--) {
        $factorial *= $i;
    }
    echo "$factorial <br>";
}

factorial(5);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("7-") . '<h4>';
function fibonacci($n)
{
    $a = 0;
    $b = 1;
    for ($i = 0; $i < $n; $i++) {
        echo $a . " ";
        $temp = $a;
        $a = $b;
        $b = $temp + $a;
    }
    echo "<br>";
}

fibonacci(10);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("8-") . '<h4>';
$text = "Orange Coding Academy";
$count = substr_count($text, 'c') + substr_count($text, 'C');
echo "$count <br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("9-") . '<h4>';
echo '<table cellpadding="3px" cellspacing="0px" border="1">';
for ($i = 1; $i <= 6; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= 5; $j++) {
        echo '<td>' . $i . ' * ' . $j . ' = ' . $i * $j . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
echo "<br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("10-") . '<h4>';
for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz ";
    } else if ($i % 3 == 0) {
        echo "Fizz ";
    } else if ($i % 5 == 0) {
        echo "Buzz ";
    } else {
        echo "$i ";
    }
}
echo "<br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("11-") . '<h4>';
function floyd_triangle($lines)
{
    $num = 1;
    for ($i = 1; $i <= $lines; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $num . " ";
            $num++;
        }
        echo "<br>";
    }
}

floyd_triangle(5);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("12-") . '<h4>';



for ($i = 1; $i <= 5; $i++) {
    for ($j = 5; $j > $i; $j--) {
        echo "&nbsp;&nbsp;";
    }
    for ($k = 1; $k <= $i; $k++) {
        echo chr(64 + $k) . " ";
    }
    if ($i == 1) {
        echo "A";
    }
    echo "<br>";
}
for ($i = 4; $i >= 2; $i--) {
    for ($j = 5; $j > $i; $j--) {
        echo "&nbsp;&nbsp;";
    }
    for ($k = 1; $k <= $i; $k++) {
        echo chr(64 + $k) . " ";
    }
    echo "<br>";
}
