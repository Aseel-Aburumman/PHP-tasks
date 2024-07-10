<?php

echo '<h2>' . ("PHP basic tasks") . '<h2>';
echo '<h4>' . ("Array") . '<h4>';

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("1- ") . '<h4>';

$colors = array("red", "green", "white");
$text1 = "The memory of that scene for me is like a frame of film forever frozen at that moment: the $colors[0]
carpet, the $colors[1] lawn, the $colors[2] house, the leaden sky. The new president and his first lady. -
Richard M. Nixon";
echo $text1;
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("2- ") . '<h4>';
shuffle($colors);
echo "<ul>";
foreach ($colors as $color) {
    echo "<li>$color</li>";
}
echo "</ul>";
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("3- ") . '<h4>';

$cities = array(
    "Italy" => "Rome",
    "Luxembourg" => "Luxembourg",
    "Belgium" => "Brussels",
    "Denmark" => "Copenhagen",
    "Finland" => "Helsinki",
    "France" => "Paris",
    "Slovakia" => "Bratislava",
    "Slovenia" => "Ljubljana",
    "Germany" => "Berlin",
    "Greece" => "Athens",
    "Ireland" => "Dublin",
    "Netherlands" => "Amsterdam",
    "Portugal" => "Lisbon",
    "Spain" => "Madrid"
);

asort($cities);
foreach ($cities as $country => $capital) {
    echo "The capital of $country is $capital<br>";
}
// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("4- ") . '<h4>';

$color = array(4 => 'white', 6 => 'green', 11 => 'red');

$keys = array_keys($color);
echo $color[$keys[0]];

echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("5- ") . '<h4>';
$array = array(1, 2, 3, 4, 5);
$location = 4;
$newItem = '$';

array_splice($array, $location - 1, 0, $newItem);

print_r($array);
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("6- ") . '<h4>';


$fruits = array(
    "d" => "lemon",
    "a" => "orange",
    "b" => "banana",
    "c" => "apple"
);

ksort($fruits);

foreach ($fruits as $key => $value) {
    echo "$key = $value<br>";
}
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("7- ") . '<h4>';
$temper = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);
$averageTemper = array_sum($temper) / count($temper);
echo "Average Temperature is: " . round($averageTemper, 1) . "<br>";
sort($temper);
$lowestTemper = array_slice($temper, 0, 5);
echo "List of five lowest temperatures: " . implode(", ", $lowestTemper) . "<br>";
$highestTemper = array_slice($temper, -5);
echo "List of five highest temperatures: " . implode(", ", $highestTemper) . "<br>";


echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("8- ") . '<h4>';

$arrayOne = array("color" => "red", 2, 4);
$arrayTwo = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);

$mergedResult = array_merge($arrayOne, $arrayTwo);

echo "Merged Array:<br>";
echo "<pre>";
print_r($mergedResult);
echo "</pre>";


echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("9- ") . '<h4>';
function convertToUpper($array)
{
    return array_map('strtoupper', $array);
}

$colors2 = array("red", "blue", "white", "yellow");
$upperColors = convertToUpper($colors2);
print_r($upperColors);
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("10- ") . '<h4>';

function convertToLower($array)
{
    return array_map('strtolower', $array);
}

$colors3 = array("RED", "BLUE", "WHITE", "YELLOW");
$lowerColors = convertToLower($colors3);


print_r($lowerColors);
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("11- ") . '<h4>';

$divByFour = array();

for ($i = 200; $i <= 250; $i++) {
    if ($i % 4 == 0) {
        $divByFour[] = $i;
    }
}

echo implode(",", $divByFour);
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("12- ") . '<h4>';
$words = array("abcd", "abc", "de", "hjjj", "g", "wer");

$lengths = array_map('strlen', $words);

$shortestLength = min($lengths);
$longestLength = max($lengths);

echo "The shortest array length is $shortestLength. The longest array length is $longestLength.";
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("13- ") . '<h4>';

function RandomNumbers($min, $max)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, 10);
}

$min = 11;
$max = 20;

$randomNumbers = RandomNumbers($min, $max);

echo implode(" ", $randomNumbers);
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("14- ") . '<h4>';
$array1 = array(2, 0, 10, 12, 6);

$filteredArray = array_filter($array1, function ($value) {
    return $value !== 0;
});

$minValue = min($filteredArray);

echo $minValue;
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("15- ") . '<h4>';

$array = array(5, 3, 7, 8, 7, 4, 1, 1, 3);

rsort($array);

print_r($array);
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("16- ") . '<h4>';

function customFloor($number, $precision, $separator = '.')
{
    $numberParts = explode($separator, $number);
    // print_r($numberParts);
    // echo "<br>";


    $integerPart = $numberParts[0];
    $decimalPart = substr($numberParts[1], 0, $precision);

    $result = $integerPart . $separator . $decimalPart;

    return $result;
}

echo customFloor(1.155, 2, ".") . "\n";
echo "<br>";
// Output: 1.15
echo customFloor(100.25781, 4, ".") . "\n";
echo "<br>";
// Output: 100.2578
echo customFloor(-2.9636, 3, ".") . "\n";
echo "<br>";
// Output: -2.963

echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("17- ") . '<h4>';
function mergeUniqueLists($list1, $list2)
{
    $array1 = explode(", ", $list1);
    $array2 = explode(", ", $list2);

    $mergedArray = array_unique(array_merge($array1, $array2));

    sort($mergedArray);

    return implode(", ", $mergedArray);
}

$list1 = "4, 5, 6, 7";
$list2 = "4, 5, 7, 8";

echo "Sample output: " . mergeUniqueLists($list1, $list2);
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("18- ") . '<h4>';

function removeDuplicates($array)
{
    $uniqueArray = array_unique($array);


    return $uniqueArray;
}

$array = array(4, 5, 6, 7, 4, 7, 8);

$uniqueArray = removeDuplicates($array);

echo "Sample Output: " . implode(", ", $uniqueArray);
echo "<br>";


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("19- ") . '<h4>';

function isSubset($array1, $array2)
{
    return empty(array_diff($array2, $array1));
}

$array1 = array('a', '1', '2', '3', '4');
$array2 = array('a', '3');

if (isSubset($array1, $array2)) {
    echo "array2 is a subset array from array1";
} else {
    echo "array2 is not a subset array from array1";
}
