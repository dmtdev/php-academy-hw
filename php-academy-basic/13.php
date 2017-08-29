<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.08.2017
 * Time: 13:37
 */
$s = 120;
$t = 1.578;

echo "км/ч: " . round($s / $t,2);
echo "\r\n";

$m = $s / 1000;
$sec = $t / (60 * 60);
echo "м/сек: " . round($m / $sec);
