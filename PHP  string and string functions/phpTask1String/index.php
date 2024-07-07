<?php


echo '<h2>' . ("PHP basic tasks") . '<h2>';
echo '<h4>' . ("PHP String and String Functions") . '<h4>';

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("1- ") . '<h4>';
// A-
$x = "Hi my name is Aseel";
echo '<h5>' . ("a- "), strtoupper($x) . '<h5>';
// B-
echo '<h5>' . ("b- "), strtolower($x) . '<h5>';
// C-
echo '<h5>' . ("c- "), ucfirst($x) . '<h5>';
// D-
echo '<h5>' . ("d- "), ucwords($x) . '<h5>';

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("2- ") . '<h4>';
$y = "123456";
$y1 = substr($y, 0, 2);
$y2 = substr($y, 2, 2);
$y3 = substr($y, 4, 2);
echo $y1 . ":" . $y2 . ":" . $y3;

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("3- ") . '<h4>';
$w = array("i", "am", "a", "full", "stack", "developer", "at", "orange", "coding", "academy");
$wFind =  array_search("orange", $w);
if ($wFind == null) {
    echo "Word not found!";
} else {
    echo "Word found!";
}

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("4- ") . '<h4>';
$r = "www.oramge.com/index.php";
$rSplit = explode('/', $r);
// print_r($rSplit)
//  print_r($rSplit[1]);
echo end($rSplit);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("5- ") . '<h4>';
$userEmail = "info@range.com";
$userName = explode('@', $userEmail);
// print_r($userName)
print_r($userName[0]);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("6- ") . '<h4>';
$emailSlice = substr($userEmail, -3, 3);
echo $emailSlice;

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("7- ") . '<h4>';
function password_generate($chars)
{
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($data), 0, $chars);
}
// Generate a 7-character password and print it followed by a newline 
echo password_generate(7) . "\n";

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("8- ") . '<h4>';
$sentance = "that new trainee is so good";
$sentanceSlice = explode(' ', $sentance);
$newWord = "Our";
// print_r($sentanceSlice)
// print_r($sentanceSlice[0]);
array_splice($sentanceSlice, 0, 1, $newWord);
print_r($sentanceSlice);
$newsentance = implode(' ', $sentanceSlice);
echo $newsentance;

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("9- ") . '<h4>';
$try1 = "dragonboll";
$try2 = "dragonball";
$try1array = str_split($try1);
// print_r($try1array);
$try2array = str_split($try2);
$i = 0;
for ($i = 0; $i < count($try1array); $i++) {
    if ($try1array[$i] != $try2array[$i]) {
        echo "$try1array[$i]<br>";
        echo "The first different charachter is betwwen two strings at position $i : \" $try1array[$i] \" vs \" $try2array[$i] \" <br>";
        break;
    }
}

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("10- ") . '<h4>';
$string = "Twinkle, twinkle, little star.";
$array = explode(" ", $string);
var_dump($array);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("11- ") . '<h4>';

function getNextLetter($theone)
{
    $character = "abcefghijklmnopqrstuvwxyz";
    $characterarray = str_split($character);
    $characterPlace = array_search($theone, $characterarray);
    if ($characterPlace < count($characterarray) - 1) {
        echo $characterarray[$characterPlace + 1];
    } else {
        echo $characterarray[0];
    }
}
getNextLetter("z");

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("12- ") . '<h4>';
$originalString = 'The brown fox';
$stringToInsert = ' quick ';
$position = strpos($originalString, 'brown');
$result = substr_replace($originalString, $stringToInsert, $position, 0);
echo $result;

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("13- ") . '<h4>';
$withZeroes = "00000340843.25";
$withZeroesarray = str_split($withZeroes);
for ($i = 0; $i < count($withZeroesarray);) {
    if ($withZeroesarray[$i] == 0) {
        array_splice($withZeroesarray, $i, 1);
        $without = implode('', $withZeroesarray);
        // echo "$without <br>";
    } else {
        // echo "$without <br>";
        $i++;
    }
}
echo ($without);


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("14- ") . '<h4>';
$orgString = "the quick brown fox jumps over the lazy dog";
$orgStringArray = explode(' ', $orgString);
// print_r($orgStringArray);
$theword = "fox";
$theWordIndex = array_search($theword, $orgStringArray);
// print_r($theWordIndex);
array_splice($orgStringArray, $theWordIndex, 1);
// print_r($orgStringArray);

$newString = implode(' ', $orgStringArray);

echo ($newString);


// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("15- ") . '<h4>';
$withdashes = "the quick brown fox jumps- over the lazy dog---";
$withdashesarray = str_split($withdashes);
for ($i = 0; $i < count($withdashesarray);) {
    if ($withdashesarray[$i] == "-") {
        array_splice($withdashesarray, $i, 1);
        $withoutdashes = implode('', $withdashesarray);
        // echo "$withoutdashes <br>";
    } else {
        // $withoutdashes= implode('',$withdashesarray);    
        // echo "$withoutdashes <br>";
        $i++;
    }
}
echo ($withoutdashes);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("16- ") . '<h4>';
$withspecial = "26+*-65+*-*/859+5-*/+9";
$withspecialarray = str_split($withspecial);

$withoutspecialarray = array_diff($withspecialarray, ["/", "*", "-", "+", "."]);
$withoutspecial = implode('', $withoutspecialarray);
echo ($withoutspecial);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("17- ") . '<h4>';
$stringToDeleteFrom = "the quick brown fox jumps over the lazy dog";
$stringToArray = explode(' ', $stringToDeleteFrom);
// print_r($stringToArray);
array_splice($stringToArray, 5, count($stringToArray) - 5);
// print_r($stringToArray);
$deletedString = implode(' ', $stringToArray);
echo $deletedString;

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("18- ") . '<h4>';
$withcomma = "254,154,145,145.25456";
$withcommaarray = str_split($withcomma);

$withoutcommaarray = array_diff($withcommaarray, [","]);
$withoutcomma = implode('', $withoutcommaarray);
echo ($withoutcomma);

// the enter button
echo '<h4>' . "-------------------------------------------------------" . '<h4>';
// the enter button

echo '<h4>' . ("19- ") . '<h4>';

for ($char = 'a'; $char <= 'z'; $char++) {
    echo $char . ' ';
    if ($char == 'z') {
        break;
    }
}
