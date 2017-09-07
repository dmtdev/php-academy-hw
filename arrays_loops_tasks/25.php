<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 07.09.2017
 * Time: 20:40
 */

$array = array();

$count = rand(10, 100);
for ($i = 0; $i < $count; $i++) {
    $array[] = rand(1, 100000);
}

$min = $array[0];
$max = $array[0];
$minIndex = 0;
$maxIndex = 0;

for ($i = 0; $i < count($array)-1; $i++) {
    if ($min > $array[$i + 1]) {
        $min = $array[$i + 1];
        $minIndex = $i + 1;
    }
    if ($max < $array[$i + 1]) {
        $mas = $array[$i + 1];
        $maxIndex = $i + 1;
    }
}

$array[$maxIndex] = $min;
$array[$minIndex] = $max;