<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 05.09.2017
 * Time: 20:10
 */

$arr = array();
$total = 0;

for ($i = 100000; $i <= 999999; $i++) {
    $arr[$i] = $i;
}

foreach ($arr as $value) {
    $firstHalf = 0;
    $secondHalf = 0;

    $tmpNum = $value;

    for ($i = 0; $i < 3; $i++) {
        $firstHalf += substr($tmpNum, $i, 1);
    }

    for ($i = 3; $i < 6; $i++) {
        $secondHalf += substr($tmpNum, $i, 1);
    }

    if ($firstHalf == $secondHalf) {
        echo $value . "\n";
        $total++;
    }
}
