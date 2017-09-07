<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 17:06
 */

echo "<pre>";
$limit = 11;
for ($i = 1; $i < $limit; $i++) {
    for ($j = 1; $j < $limit; $j++) {
        $composition = $i * $j;
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