<?php
$t = time();
echo ($t . "<br>");
echo (date("Y-m-d", $t));
echo "<br>";
echo (strtotime("now") . "<br>");
echo $date = date("H:i:s");
echo "<br>";


$t = time();
echo "Timestamp: " . $t . "<br>";
echo "Formatted: " . date("H:i:s", $t) . "<br>";
