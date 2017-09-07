<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 17:51
 */

$array = array(4, 2, 5, 19, 13, 0, 10);
$e = array(2,3,4);

foreach ($array as $value){
    if(in_array($value, $e)){
        echo $value." Есть!".PHP_EOL;
    }
    else{
        echo $value."Нет!".PHP_EOL;
    }
}