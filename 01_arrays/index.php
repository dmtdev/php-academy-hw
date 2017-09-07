<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05.09.2017
 * Time: 11:45
 */

//1
echo "Task 1" . PHP_EOL;
$n = 10;
for ($i = 0; $i < $n; $i++) {
    echo "Silence is golden" . PHP_EOL;
}

//2
echo "Task 2" . PHP_EOL;
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

//3.1
echo "Task 3.1" . PHP_EOL;
$n = 1;
for ($n = 1; $n < 201; $n++) {
    echo $n . PHP_EOL;
}

//3.2
echo "Task 3.2" . PHP_EOL;
function is_prime($number)
{
    for ($i = 2; $i < sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

for ($n = 1; $n < 201; $n++) {
    if ($n != 1 and is_prime($n)) {
        echo $n . PHP_EOL;
    }
}

//3.3
echo "Task 3.3" . PHP_EOL;
for ($n = 1; $n < 201; $n++) {
    if (gmp_prob_prime($n)) {
        echo $n . PHP_EOL;
    }
}

//4
echo "Task 4" . PHP_EOL;
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
echo "Task 5" . PHP_EOL;
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
echo "Task 6" . PHP_EOL;
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
echo "Task 7" . PHP_EOL;
$happyNumbersCount = 0;
$allNumbers = 0;
for ($i = 100000; $i < 999999; $i++) {
    $firstThreeDigits = array();
    $secondThreeDigits = array();
    $number = $i;
    while ($number % 10 > 0 or $number / 10 > 0) {
        $remainder = $number % 10;
        if (count($secondThreeDigits) > 2) {
            $firstThreeDigits[] = $remainder;
        } else {
            $secondThreeDigits[] = $remainder;
        }
        $number = ($number - $remainder) / 10;
    }
    if (array_sum($firstThreeDigits) == array_sum($secondThreeDigits)) {
        echo $i . PHP_EOL;
        $happyNumbersCount++;
    }
    $allNumbers++;
}
echo "Percent of happy numbers: " . round($happyNumbersCount / $allNumbers * 100, 2) . PHP_EOL;
$happyNumbersCount = 0;
$allNumbers = 0;
for ($i = 100000; $i < 1000000; $i++) {
    $firstThreeDigits = array();
    $secondThreeDigits = array();
    $number = $i;
    while ($number % 10 > 0 or $number / 10 > 0) {
        if (count($secondThreeDigits) > 2) {
            $remainder = $number % 10;
            $firstThreeDigits[] = $remainder;
            $number = ($number - $remainder) / 10;
        } else {
            $remainder = $number % 10;
            $secondThreeDigits[] = $remainder;
            $number = ($number - $remainder) / 10;
        }
    }
    if (array_sum($firstThreeDigits) == array_sum($secondThreeDigits)) {
        echo $i . PHP_EOL;
        $happyNumbersCount++;
    }
    $allNumbers++;
}
echo "Percent of happy numbers: " . round($happyNumbersCount / $allNumbers * 100,2) . PHP_EOL;

//8
echo "Task 8" . PHP_EOL;
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
echo "Task 9" . PHP_EOL;
$n = 10;
$result = array();
for ($i = 0; $i < $n; $i++) {
    $result[$i] = $i * $i;
}

//10
echo "Task 10" . PHP_EOL;
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

$thousands = array(
    1 => "тысяча",
    2 => "тысячи",
    3 => "тысячи",
    4 => "тысячи",
    5 => "тысячь",
    6 => "тысячь",
    7 => "тысячь",
    8 => "тысячь",
    9 => "тысячь",
    10 => "тысячь",
    11 => "тысячь",
    12 => "тысячь",
    13 => "тысячь",
    14 => "тысячь",
    15 => "тысячь",
    16 => "тысячь",
    17 => "тысячь",
    18 => "тысячь",
    19 => "тысячь",
);

$digits = array(
    1 => "один",
    2 => "два",
    3 => "три",
    4 => "четыре",
    5 => "пять",
    6 => "шесть",
    7 => "семь",
    8 => "восемь",
    9 => "девять",
    10 => "десять",
    11 => "одинадцать",
    12 => "двенадцать",
    13 => "тринадцать",
    14 => "четырнадцать",
    15 => "пятнадцать",
    16 => "шеснадцать",
    17 => "семнадцать",
    18 => "восемнадцать",
    19 => "девятнадцать"
);

$thousandsDigits = array(
    1 => "одна",
    2 => "две",
    3 => "три",
    4 => "четыре",
    5 => "пять",
    6 => "шесть",
    7 => "семь",
    8 => "восемь",
    9 => "девять",
    10 => "десять",
);

$test = array(
    20 => "двадцать",
    30 => "тридцать",
    40 => "сорок",
    50 => "пятьдесят",
    60 => "шестьдесят",
    70 => "семдесят",
    80 => "восемдесят",
    90 => "девяносто"
);

$hundreds = array(
    100 => "сто",
    200 => "двести",
    300 => "триста",
    400 => "четыреста",
    500 => "пятьсот",
    600 => "шестьсот",
    700 => "семьсот",
    800 => "восемсот",
    900 => "девятьсот",

);


$n = 111111;
$tmp = $n;
$result = array();
$resultDigits = array();

while ($tmp % 10 > 0 or $tmp / 10 > 0) {
    $remainder = $tmp % 10;
    $resultDigits[] = $remainder;
    $tmp = ($tmp - $remainder) / 10;
}
if ($n > 0 and $n < 20) {
    $result[] = $digits[$n];
} else {
    foreach ($resultDigits as $key => $value) {
        switch ($key) {
            case 1: {
                if (($resultDigits[1] * 10 + $resultDigits[0]) > 0 and ($resultDigits[1] * 10 + $resultDigits[0]) < 20) {
                    $result[] = $digits[($resultDigits[1] * 10 + $resultDigits[0])];
                } else {
                    $result[] = $digits[$resultDigits[0]];
                    $result[] = $tens[$resultDigits[1] * 10];
                }
                break;
            }
            case 2: {
                $result[] = $hundreds[$resultDigits[2] * 100];
                break;
            }
            case 3: {
                if ($resultDigits[4]) {
                    if (($resultDigits[4] * 10 + $resultDigits[3]) > 0 and ($resultDigits[4] * 10 + $resultDigits[3]) < 20) {
                        $result[] = $thousands[($resultDigits[4] * 10 + $resultDigits[3])];
                        $result[] = $digits[($resultDigits[4] * 10 + $resultDigits[3])];
                    } else {
                        $result[] = $thousands[$resultDigits[3]];
                        $result[] = $thousandsDigits[$resultDigits[3]];
                        $result[] = $tens[$resultDigits[4] * 10];
                    }
                } else {
                    $result[] = $thousands[$resultDigits[3]];
                    $result[] = $digits[$resultDigits[3]];
                }
                break;
            }
            case 5: {
                $result[] = $hundreds[$resultDigits[4] * 100];
                break;
            }
            default : {
                break;
            }
        }
    }
}
echo join(" ", array_reverse($result)) . PHP_EOL;


//12
echo "Task 12" . PHP_EOL;
$array = range("a", "z");
$i = 0;
foreach ($array as $value) {
    if ($i % 2 != 0) {
        echo $value . PHP_EOL;
    }
    $i++;
}