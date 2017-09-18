<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 15.09.2017
 * Time: 12:32
 */


//Task 1
$array = array('one', 'two', 'three', 'four', 'five', 'six');
//($previousElem, $nextElem) use ($array)
$counter = 0;
//$previousElem, $nextElem
usort($array, function ($previousElem, $nextElem) use (&$counter) {
    if ($counter % 2 == 0) {
        $counter += 2;
        return 1;
    }
//    else {
//        $counter++;
//        return -1;
//    }
//    return 0;
});

//var_dump($array);

//die();

//Task 2 - часто возвращает пустой массив, rand - для ускорения создания массива
$array = range(1, 1000000, rand(1, 10000));

$array = array_filter($array, function ($elem) use ($array) {
    if ($elem % 2 == 0 and !$elem % 3 == 0 and $elem % 5 == 0) {
        return 1;
    }
    return 0;
});
var_dump($array);

//Task 3
$string = 'Walks Straight walked numbly through the destruction. Nothing left, no one alive';
$array = explode(" ", preg_replace('/[^a-z\s]/i', '', $string));

usort($array, function ($a, $b) {
    if (strlen($a) < strlen($b)) {
        return -1;
    } elseif (strlen($a) > strlen($b)) {
        return 1;
    }
    return 0;
});

var_dump($array);

//Task 4
function sayHello(string $name)
{
    static $count = 0;
    $count++;
    echo "Привет, " . $name . PHP_EOL;
    echo "Всего поздоровались " . $count . " раз" . PHP_EOL;
}

//
sayHello("Dmitry");
sayHello("Ivan");
sayHello("Jon");

//Task 5
function average($n)
{
    static $numbers = array();
    $numbers[] = $n;
    $result = 0;
    for ($i = 0; $i < count($numbers); $i++) {
        $result += $numbers[$i];
    }
    return $result / count($numbers);

}

echo average(1) . PHP_EOL;
echo average(5) . PHP_EOL;
echo average(3) . PHP_EOL;
echo average(31) . PHP_EOL;

//Task 6
function isPalindrome($string)
{
    static $charCount = 0;
    static $palindrome = "";
    $charCount = strlen($string) - 1;
    var_dump($charCount);
    if ($charCount > 0) {
        $palindrome .= $string[$charCount];
        $charCount--;
        isPalindrome($string);
    } else {
        if ($string == $palindrome) {
            echo "Да" . PHP_EOL;
        } else {
            echo "Нет" . PHP_EOL;
        }
    }
}

//isPalindrome("abba");
//isPalindrome("palindrome");

//Task
function numRevers(&$number)
{
    static $result = 0;
    if ($number > 0) {
        $result = ($result + ($number % 10)) * 10;
        $number = ($number - ($number % 10)) / 10;
        return numRevers($number);
    } else {
        return $result / 10;
    }
}

$num = 321;
echo numRevers($num);
