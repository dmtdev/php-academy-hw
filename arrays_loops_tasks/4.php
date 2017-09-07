<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 15:47
 */

$array = array(
    'green' => 'зеленый',
    'red' => 'красный',
    'blue' => 'голубой'
);

foreach ($array as $key => $value) {
    echo $key . PHP_EOL;
}
foreach ($array as $value) {
    echo $value . PHP_EOL;
}
