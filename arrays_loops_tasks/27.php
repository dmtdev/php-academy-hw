<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 07.09.2017
 * Time: 21:06
 */

$colors = array('red', 'yellow', 'blue', 'gray', 'maroon', 'brown', 'green');
$rows = rand(1, 20);
$cols = rand(1, 20);

var_dump($rows);
var_dump($cols);

$table = "<table border='1'>";

for ($i = 0; $i < $rows; $i++) {
    $table .= "<tr>";
    for ($j = 0; $j < $cols; $j++) {

        $table .= "<td style=\"background-color:" . $colors[rand(0, 6)] . "\">" . rand() . "</td>";
    }
    $table .= "</tr>";
}
$table .= "</table>";

echo $table;
