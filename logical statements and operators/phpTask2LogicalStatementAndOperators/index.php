<?php


echo '<h2>' . ("PHP basic tasks") . '<h2>';
echo '<h4>' . ("logical statements and operators") . '<h4>';

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("1-") . '<h4>';
function isItLeapYear($theyear)
{
    //  لتقويم الميلادي Gregorian Calendar
    $d = cal_days_in_month(CAL_GREGORIAN, 2, $theyear);
    if ($d == 28) {
        echo "This year is a Leap year <br>";
    } else {
        echo "This year is not a Leap year <br>";
    }
}
isItLeapYear("2024");
isItLeapYear("2013");

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("2-") . '<h4>';
function season($theTemp)
{
    if ($theTemp < 20) {
        echo "It is Winter Time ! <br>";
    } else if ($theTemp >= 20) {
        echo "It is Summer Time ! <br>";
    }
}
season(20);
season(10);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("3-") . '<h4>';

function theSum($a, $b)
{
    if ($a == $b) {
        $sumOutput = ($a + $b) * 3;
        echo "$sumOutput <br>";
    } else {
        $sumOutput = $a + $b;
        echo "$sumOutput <br>";
    }
}

theSum(1, 2);
theSum(2, 2);


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("4-") . '<h4>';

function theSum30($c, $d)
{
    $v = $c + $d;
    if ($v == 30) {
        echo "$v <br>";
    } else {
        echo "False <br>";
    }
}

theSum30(10, 20);
theSum30(2, 2);


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("5-") . '<h4>';
function multi3($f)
{
    $E = $f / 3;
    if (is_float($E)) {
        echo "False <br>";
    } else {
        echo "True <br>";
    }
}

multi3(10);
multi3(12);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("6-") . '<h4>';
function inTheRange($num1)
{
    if ($num1 >= 20 && $num1 <= 50) {
        echo "True <br>";
    } else {
        echo "False <br>";
    }
}

inTheRange(30);
inTheRange(52);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("7-") . '<h4>';
echo (max(1, 5, 9));
echo "<br>";

function maxOf3($num1, $num2, $num3)
{
    if ($num1 > $num2 && $num1 > $num3) {
        echo "$num1 <br>";
    } else if ($num2 > $num1 && $num2 > $num3) {
        echo "$num2 <br>";
    } else {
        echo "$num3 <br>";
    }
}

maxOf3(1, 5, 9);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("8-") . '<h4>';
function bill($consumtion)
{
    if ($consumtion <= 50) {
        $theBill = $consumtion * 2.5;
        echo $theBill;
        echo "<br>";
    } else if ($consumtion > 50 && $consumtion <= 150) {
        $theBill = (50 * 2.5) + (($consumtion - 50) * 5);
        echo $theBill;
        echo "<br>";
    } else if ($consumtion > 150 && $consumtion <= 250) {
        $theBill = (50 * 2.5) + (100 * 5) + (($consumtion - 150) * 6.2);
        echo $theBill;
        echo "<br>";
    } else if ($consumtion > 250) {
        $theBill = (50 * 2.5) + (100 * 5) + (100 * 6.2) + (($consumtion - 250) * 7.5);
        echo $theBill;
        echo "<br>";
    }
}

bill(40);
bill(52);
bill(151);
bill(252);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("9-") . '<h4>';
echo '<h4>' . ("بملف لحال") . '<h4>';

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("10-") . '<h4>';
function eligible($age)
{
    if ($age < 18) {
        echo "you are too young for this !";
        echo "<br>";
    } else {
        echo "you are good , be responsible";
        echo "<br>";
    }
}
eligible(18);
eligible(15);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("11-") . '<h4>';
function whatisthis($number)
{
    if ($number < 0) {
        echo "Negative!";
        echo "<br>";
    } else if ($number == 0) {
        echo "this is zero";
        echo "<br>";
    } else {
        echo "Positive";
        echo "<br>";
    }
}
whatisthis(0);
whatisthis(6);
whatisthis(-5);


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("12-") . '<h4>';
function grade($sub1, $sub2, $sub3, $sub4, $sub5, $sub6, $sub7, $sub8, $sub9)
{
    $thegrade = ($sub1 + $sub2 + $sub3 + $sub4 + $sub5 + $sub6 + $sub7 + $sub8 + $sub9) / 9;
    if ($thegrade < 60) {
        echo "your grade is F";
        echo "<br>";
    } else     if ($thegrade < 70) {
        echo "your grade is D";
        echo "<br>";
    } else     if ($thegrade < 80) {
        echo "your grade is C";
        echo "<br>";
    } else     if ($thegrade < 90) {
        echo "your grade is B";
        echo "<br>";
    } else {
        echo "your grade is A";
        echo "<br>";
    }
}
grade(90, 50, 90, 60, 80, 90, 59, 96, 46);
