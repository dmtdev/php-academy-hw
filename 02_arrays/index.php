<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 07.09.2017
 * Time: 21:25
 */

//Task 1
$string = "foo, baz ";
$letter = 'b';
$array = explode(" ", trim($string));
$wordsCount = 0;

foreach ($array as $value) {
    if ($value[0] == $letter) {
        $wordsCount++;
    }
}
var_dump($wordsCount);

//Task 2

$string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
$result = array();
$letters = array('r', 'k', 't');

for ($i = 0; $i < strlen($string); $i++) {
    if (in_array($string[$i], $letters)) {
        $result[$i] = $string[$i];
    }
}
$rktCounts['r'] = 0;
$rktCounts['k'] = 0;
$rktCounts['t'] = 0;
foreach ($result as $value) {
    $rktCounts[$value]++;
}
var_dump($rktCounts);

//Task 3
$string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

$min = 0;
$max = 0;


$string = preg_replace('/[^a-z\s\-]/i', '', $string);
$array = explode(" ", trim($string));

$min = strlen($array[0]);
$max = strlen($array[0]);


for ($i = 0; $i < count($array) - 1; $i++) {
    if ($min > strlen($array[$i + 1])) {
        $min = strlen($array[$i + 1]);
    }
    if ($max < strlen($array[$i + 1])) {
        $max = strlen($array[$i + 1]);
    }
}
echo 'min:'.$min.', max: '.$max.PHP_EOL;

//Task 4
$string = "Lorem ipsum dolor sit: amet, consectetur adipiscing";
$array = explode(":", $string);
$strLen = strlen($array[0]);
echo $strLen.PHP_EOL;

//Task 5
$string = "Lorem ipsum dolor sit amet, consectetur adipiscing";
$string = str_replace(" ", "abc", $string);
$abcCount = substr_count($string, "abc");
var_dump($abcCount);

//Task 6
$string = "Lorem ipsum dolor sit amet, consectetur adipiscing";
$array = array_unique(str_split($string));
var_dump($array);


//Task 7
$string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

$array = explode(" ", trim(preg_replace('/[^a-z\s\-]/i', '', $string)));
$result = array();
for ($i = 0; $i < count($array); $i++) {
    if ($array[$i][0] == $array[$i][strlen($array[$i]) - 1]) {
        $result[] = $array[$i];
    }
}
var_dump($result);


//Task 8
$string = "Lorem ipsum dolor sit amet, consectetur adipiscing";
$string = str_replace(" ", ":", $string);
$string = str_replace(":", ";", $string);
$count = substr_count($string, ";");
var_dump($count);

//Task 9
$string = 'bear 48 tail9 read13 bl0b';
preg_match_all('/[0-9]{1,}/', $string, $numeric);
var_dump($numeric[0]);

//Task 10.1
$upperCount = 0;
$lowerCount = 0;
$string = "Lorem ipsum dolor sit amet, consectetur adipiscing";
$tmpString = preg_replace('/[^a-z\s\-]/i', '', $string);

for ($i = 0; $i < strlen($tmpString); $i++) {
    if ($tmpString[$i] === strtoupper($tmpString[$i])) {
        $upperCount++;
    } else {
        $lowerCount++;
    }
}
if ($upperCount > $lowerCount) {
    $string = strtoupper($tmpString);
} elseif ($upperCount < $lowerCount) {
    $string = strtolower($string);
}
echo $string.PHP_EOL;

//Task 10.2
$upperCount = 0;
$lowerCount = 0;
$letters = range('a', 'z');
$string = "Lorem ipsum dolor sit amet, consectetur adipiscing";
$tmpString = preg_replace('/[^a-z\s\-]/i', '', $string);

for ($i = 0; $i < strlen($tmpString); $i++) {
    if (in_array(strtolower($tmpString[$i]), $letters)) {
        $lowerCount++;
    } else {
        $upperCount++;
    }
}


if ($upperCount > $lowerCount) {
    $string = strtoupper($string);
} elseif ($upperCount < $lowerCount) {
    $string = strtolower($string);
}
echo $string.PHP_EOL;

//Task 11
$string = 'abba';
$isPalindrome = false;
$array = str_split($string);
$string2 = join("", array_reverse($array));
if ($string == $string2) {
    $isPalindrome = true;
} else {
    $isPalindrome = false;
}
var_dump($isPalindrome);

//Task 12.1
//не предусмотрена проверка спецсимволов..
$string = "drow yarra gnirts";
$array = explode(" ", $string);
$result = array();
foreach ($array as $value) {
    $value = str_split($value);
    $result[] = join("", array_reverse($value));
}
echo join(" ", $result) . PHP_EOL;


//Task 12.2
$string = "drow, yarra. gnirts";
preg_match_all('/[a-z]{1,}/ui',$string,$words);
$words = $words[0];
$reverseWords = array();
foreach ($words as $value){
    $reverseWords[] = join("",array_reverse(str_split($value)));
}
$string = str_replace($words,$reverseWords,$string);
echo $string.PHP_EOL;


//Task 13
$vowels = array('a', 'e', 'i', 'o', 'u', 'y');
$consonant = array('b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
$string = strtolower('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

$vowelsCount = 0;
$consonantCount = 0;

for ($i = 0; $i < strlen($string); $i++) {
    if (in_array(strtolower($string[$i]), $vowels)) {
        $vowelsCount++;
    } elseif (in_array(strtolower($string[$i]), $consonant)) {
        $consonantCount++;
    }
}
if ($vowelsCount > $consonantCount) {
    echo "больше гласных" . PHP_EOL;
} elseif ($vowelsCount < $consonantCount) {
    echo "больше согласных" . PHP_EOL;
} else {
    echo "количество гласніх и согласніх одинаково" . PHP_EOL;
}


//Task 14
$array = array("Иванов И.И.", "Иванов A.И.", "Петров А.В", "Сидоров А.А", "Сидоров В.А", "Сидоров А.В");
$result = array();
$homonym = array();

foreach ($array as $value) {
    $value = explode(" ", $value);
    if (!isset($result[$value[0]])) {
        $result[$value[0]] = 0;
    }
    $result[$value[0]]++;
}
foreach ($array as $value) {
    $tmp = explode(" ", $value);
    $homonym[$value] = $result[$tmp[0]];
}
var_dump($homonym);

