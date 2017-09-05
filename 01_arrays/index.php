<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05.09.2017
 * Time: 11:45
 */

//1
$n = 10;
for ($i = 0; $i < $n; $i++) {
    echo "Silence is golden" . PHP_EOL;
}

//2
$result = 0;
$n = 1;
for ($n; $n < 151; $n++) {
    $result += $n;
}
echo $result . PHP_EOL;

$result = 0;
$n = 1;
while ($n < 151) {
    $result += $n;
    $n++;
}
echo $result . PHP_EOL;

//3
$n = 1;
for ($n = 1; $n < 201; $n++) {
    echo $n . PHP_EOL;
}

//4
$array = array();
echo "4FOR" . PHP_EOL;
$n = 200;
for ($n = 200; $n > 0; $n--) {
    $array[] = $n;
    echo $n . PHP_EOL;
}

echo "4WHILE" . PHP_EOL;
$n = 200;
while ($n > 1) {
    $n--;
    echo $n . PHP_EOL;
}

echo "4FOREACH" . PHP_EOL;
foreach ($array as $v) {
    echo $v . PHP_EOL;
}

//5
$array = array();
$n = 51;
$result = 1;
for ($i = 1; $i < $n; $i++) {
    $result *= $i;
    $array[] = $i;
}
echo $result . PHP_EOL;

$result = 1;
foreach ($array as $value) {
    $result *= $value;
}
echo $result . PHP_EOL;

//6
$n = 1000;
for ($i = 0; $i < $n; $i++) {
    if ($i % 3 == 0 and $i % 5 == 0) {
        echo $i . PHP_EOL;
    }
}

$i = 0;
while ($i < $n) {
    if ($i % 3 == 0 and $i % 5 == 0) {
        echo $i . PHP_EOL;
    }
    $i++;
}

//7
//$happyNumbersCount = 0;
//$allNumbers = 0;
//for ($i = 100000; $i < 999999; $i++) {
//    $firstThreeDigits = array();
//    $secondThreeDigits = array();
//    $number = $i;
//    while ($number % 10 > 0 or $number / 10 > 0) {
//        if (count($secondThreeDigits) > 2) {
//            $remainder = $number % 10;
//            $firstThreeDigits[] = $remainder;
//            $number = ($number - $remainder) / 10;
//        } else {
//            $remainder = $number % 10;
//            $secondThreeDigits[] = $remainder;
//            $number = ($number - $remainder) / 10;
//        }
//    }
//    if (array_sum($firstThreeDigits) == array_sum($secondThreeDigits)) {
//        echo $i . PHP_EOL;
//        $happyNumbersCount++;
//    }
//    $allNumbers++;
//}
//echo "Percent of happy numbers: " . round($happyNumbersCount / $allNumbers * 100,2) . PHP_EOL;

//8
$n = 100;
$array = array();
for ($i = 0; $i < $n; $i++) {
    if ($i % 2) {
        $array[] = 1;
    } else {
        $array[] = 0;
    }
}

$array = array();
while ($n > 0) {
    if ($n % 2) {
        $array[] = 1;
    } else {
        $array[] = 0;
    }
    $n--;
}

//9
$array1 = [1, 3, 5, 7, 8];
$array2 = [3, 5, 88, 99];

//php functions
$resultArray = array_merge($array1, $array2);
sort($resultArray);

//without php functions
for ($i = 0; $i < count($array2); $i++) {
    $array1[] = $array2[$i];
}

for ($i = 0; $i < count($array1); $i++) {
    for ($j = $i + 1; $j < count($array1); $j++) {
        if ($array1[$i] > $array1[$j]) {
            $tmp = $array1[$j];
            $array1[$j] = $array1[$i];
            $array1[$i] = $tmp;
        }
    }
}

//11
$n = 125458;
$thousands = array(
    1=>"тысяча",
    2=>"тысячи",
    3=>"тысячи",
    4=>"тысячи",
    5 =>"тысячь",
    6 =>"тысячь",
    7 =>"тысячь",
    8 =>"тысячь",
    9 =>"тысячь",
);

$digits  = array(
    1=>"один",
    2=>"два",
    3=>"три",
    4=>"четыре",
    5 =>"пять",
    6 =>"шесть",
    7 =>"семь",
    8 =>"восемь",
    9 =>"девять",
    10 =>"десять",
    11 =>"одинадцать",
    12 =>"двенадцать",
    13 =>"тринадцать",
    14 =>"четырнадцать",
    15 =>"пятнадцать",
    16 =>"шеснадцать",
    17 =>"семнадцать",
    18 =>"восемнадцать",
    19 =>"девятнадцать",


);


//12
$array = range("a", "z");
$i = 0;
foreach ($array as $value) {
    if ($i % 2) {
        echo $value;
    } else {
        echo $value . PHP_EOL;
    }
    $i++;
}