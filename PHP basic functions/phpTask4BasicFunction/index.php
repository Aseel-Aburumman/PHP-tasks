<?php

echo '<h2>' . ("PHP basic tasks") . '<h2>';
echo '<h4>' . ("functions") . '<h4>';

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("1- ") . '<h4>';

function isPrime($num)
{
    if ($num <= 1) {
        return "$num is not a prime number";
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return "$num is not a prime number";
        }
    }
    return "$num is a prime number";
}

echo isPrime(3);
echo "<br>";
echo isPrime(4);
echo "<br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("2- ") . '<h4>';

function reverseString($str)
{
    return strrev($str);
}

echo reverseString("remove");
echo "<br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("3- ") . '<h4>';

function isAllLowerCase($str)
{
    if (ctype_lower($str)) {
        return "Your String is Ok";
    } else {
        return "Your String is not Ok";
    }
}

echo isAllLowerCase("remove");
echo "<br>";
echo isAllLowerCase("Remove");
echo "<br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("4- ") . '<h4>';

function swap(&$x, &$y)
{
    $temp = $x;
    $x = $y;
    $y = $temp;
}

$x = 12;
$y = 10;
swap($x, $y);
echo "x=$x y=$y";
echo "<br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("5- ") . '<h4>';

$x = 12;
$y = 10;
swap($x, $y);
echo "x=$x y=$y";
echo "<br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("6- ") . '<h4>';

function isArmstrong($num)
{
    $sum = 0;
    $temp = $num;
    while ($temp != 0) {
        $digit = $temp % 10;
        $sum += $digit ** 3;
        $temp = (int)($temp / 10);
    }
    if ($sum == $num) {
        return "$num is Armstrong Number";
    } else {
        return "$num is not Armstrong Number";
    }
}

echo isArmstrong(407);
echo "<br>";
echo isArmstrong(123);
echo "<br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("7- ") . '<h4>';

function isPalindrome($str)
{
    $cleanStr = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($str));
    if ($cleanStr == strrev($cleanStr)) {
        return "Yes it is a palindrome";
    } else {
        return "No it is not a palindrome";
    }
}

echo isPalindrome("Eva, can I see bees in a cave?");
echo "<br>";
echo isPalindrome("Hello");
echo "<br>";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("8- ") . '<h4>';

function removeDuplicates($array)
{
    return array_values(array_unique($array));
}

$array1 = array(2, 4, 7, 4, 8, 4);
$array1 = removeDuplicates($array1);
print_r($array1);
echo "<br>";
