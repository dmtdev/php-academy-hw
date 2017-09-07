<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 16:05
 */

$array = array(1, 2, 3, 4, 5, 6, 7, 8, 9);

$result = "";

foreach ($array as $value) {
    $result .= (string)$value;
}
echo $result . PHP_EOL;
$result = "";

for ($i = 0; $i < count($array); $i++) {
    $result .= (string)$array[$i];
}
echo $result . PHP_EOL;
$result = "";

$i = 0;
while ($i != count($array)) {
    $result .= (string)$array[$i];
    $i++;
}
echo $result . PHP_EOL;