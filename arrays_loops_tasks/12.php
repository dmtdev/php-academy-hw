<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 16:26
 */

$n = 1000;
$countIters = 0;

do {
    $n /= 2;
    $countIters++;
} while ($n > 50);
echo "n: " . $n . PHP_EOL;
echo "count: " . $countIters . PHP_EOL;
