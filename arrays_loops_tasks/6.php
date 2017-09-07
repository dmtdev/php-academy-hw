<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 16:02
 */

$array = array('green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой');
$en = array();
$ru = array();

foreach ($array as $key => $value) {
    $en[] = $key;
    $ru[] = $value;
}
