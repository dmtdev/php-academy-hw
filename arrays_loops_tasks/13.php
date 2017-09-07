<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 16:52
 */

$i = 0;
$j = 0;
$limit = 11;
echo "<pre>";
echo "while:" . PHP_EOL;
while ($i < $limit) {
    while ($j < $limit) {
        if ($i == 0) {
            $composition = $j;
        } elseif ($j == 0) {
            $composition = $i;
        } else {
            $composition = $i * $j;
        }
        if ($composition < 10) {
            $composition = "   " . $composition;
        } elseif ($composition > 9 and $composition < 100) {
            $composition = "  " . $composition;
        } elseif ($composition == 100) {
            $composition = " " . $composition;
        }
        echo $composition;
        $j++;
    }
    echo PHP_EOL;
    $j = 0;
    $i++;
}

echo "foreach:" . PHP_EOL;
$array = array(0,1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

foreach ($array as $i) {
    foreach ($array as $j) {
        if ($i == 0) {
            $composition = $j;
        } elseif ($j == 0) {
            $composition = $i;
        } else {
            $composition = $i * $j;
        }
        if ($composition < 10) {
            $composition = "   " . $composition;
        } elseif ($composition > 9 and $composition < 100) {
            $composition = "  " . $composition;
        } elseif ($composition == 100) {
            $composition = " " . $composition;
        }
        echo $composition;
    }
    echo PHP_EOL;
}