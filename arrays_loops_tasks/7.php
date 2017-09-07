<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 16:04
 */

$array = array(2, 5, 9, 15, 0, 4);

foreach ($array as $value) {
    if ($value > 3 and $value < 10) {
        echo $value . PHP_EOL;
    }
}