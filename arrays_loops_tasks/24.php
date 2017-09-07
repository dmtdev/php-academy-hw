<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 07.09.2017
 * Time: 20:32
 */

$search = 0;
$number = 1250554745;
$count = 0;

while ($number % 10 > 0 or $number / 10 > 0) {
    $remainder = $number % 10;
    ($remainder == $search ? $count++ : $count) ;
    $number = ($number - $remainder) / 10;
}
echo $count;