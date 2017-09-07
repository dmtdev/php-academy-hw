<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 07.09.2017
 * Time: 20:55
 */

$array = array_fill(0, 100, 0);

for ($i = 0; $i < count($array); $i++) {
    $array[$i] = rand(-100, 100);
}

$condition = 1;
foreach ($array as $key => $value) {
    if ($key % 2 == 0 and $value > 0) {
        $condition *= $value;
    }
    if ($key % 2 != 0 and $value > 0) {
        echo $value . PHP_EOL;
    }
}
echo $condition.PHP_EOL;