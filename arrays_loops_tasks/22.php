<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 07.09.2017
 * Time: 20:04
 */

for ($i = 2; $i < 11; $i+=2) {
    echo join("", array_fill(0, $i, "x")) . PHP_EOL;
}

echo PHP_EOL;

$i = 2;
while($i<11){
    echo join("", array_fill(0, $i, "x")) . PHP_EOL;
    $i += 2;
}