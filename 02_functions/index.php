<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 12.09.2017
 * Time: 14:26
 */

//Task 1

/**
 * @param $number
 * @param int $power
 * @return int|string
 */
function involution($number, $power = 2)
{
    if ($power < 1 or !is_numeric($power)) {
        return "not correct arg: \$power";
    }
    if (!is_numeric($number)) {
        return "not correct arg: \$number";
    }
    $result = $number;
    for ($i = 0; $i < ($power - 1); $i++) {
        $result *= $number;
    }
    return $result;
}

var_dump(involution(2, 1));
var_dump(involution(2.12, 3));
var_dump(involution(2.12, 0));

//Task 2

/**
 * @param int $min
 * @param int $max
 * @param int $length
 * @return array|string
 */
function randarray($min, $max, $length)
{
    if (!is_numeric($max) or !is_numeric($min) or !is_numeric($length) or $length < 1) {
        return "incorrect args";
    }
    $resultArray = array();
    for ($i = 0; $i < $length; $i++) {
        $resultArray[] = rand($min, $max);
    }
    return $resultArray;
}

var_dump(randarray(10, 1, 10));
var_dump(randarray(10, 1, 22));

//Task 3

/**
 * @param array ...$args
 * @return int|mixed|string
 */
function calcSum(...$args)
{
    $sum = 0;
    if (is_array($args[0])) {
        for ($i = 0; $i < count($args[0]); $i++) {
            $sum += $args[0][$i];
        }
    } else {
        return "incorrect args,\$args[0] !array";
    }
    return $sum;
}

var_dump(calcSum([1, 3, 5], 5));
var_dump(calcSum([1, 3, 7]));

//Task 4

/**
 * @return int
 */
function calcMaxElemSum()
{
    $arrays = array();
    for ($i = 0; $i < 140; $i++) {
        $arrays[] = randarray(1, 100, 158);
    }
    $maxArrayIndex = 0;
    $sum = 0;
    foreach ($arrays as $key => $value) {
        if (calcSum($value) > $sum) {
            $sum = calcSum($value);
            $maxArrayIndex = $key;
        }
    }
    return $arrays[$maxArrayIndex];
}

var_dump(calcMaxElemSum());

//Task 5
$string = "string";

/**
 * @param $string
 */
function changeString(&$string)
{
    $string .= 'functioned!';
}

changeString($string);
var_dump($string);

//Task 6
$i = 1;

/**
 * @param int $n
 */
function print_n($n)
{
    global $i;
    if ($i < $n + 1) {
        echo " " . $i;
        $i++;
        print_n($n);
    }
}

//print_n(10);

//Task 6.fix

/**
 * @param  int $n
 */
function print_n2($n)
{
    echo ($n - ($n - 1)) . " ";
    $n--;
    if ($n > 1) {
        print_n2($n);
    }

}

//print_n2(145);

function print_n3($n)
{
    echo $n . " ";
    $n--;
    if (0 < $n) {
        print_n3($n);
    }
}

// print_n3(100);
function print_n4($n)
{
    if (--$n > 0) {
        print_n4($n);
    }
    echo $n + 1 . " ";
}
print_n4(10);