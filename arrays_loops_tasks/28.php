<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 17:06
 */

echo "<pre>";
$limit = 11;
for ($i = 0; $i < $limit; $i++) {
    for ($j = 0; $j < $limit; $j++) {
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
echo "</pre>";

$table = "<table border='1'>";
$limit = 11;
for ($i = 0; $i < $limit; $i++) {
    $table .= '<tr>';
    for ($j = 0; $j < $limit; $j++) {
        if ($i == 0) {
            $composition = $j;
        } elseif ($j == 0) {
            $composition = $i;
        } else {
            $composition = $i * $j;
        }
        $table .= "<td>".$composition."</td>";
    }
    $table .= '<tr>';
}
echo $table;