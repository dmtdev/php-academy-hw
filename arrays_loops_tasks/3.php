<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 15:45
 */

$array = array(26, 17, 136, 12, 79, 15);
$result = 0;

foreach ($array as $value) {
    $result += ($value * $value);
}