<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 17:36
 */

$array = array(1, 2, 3, 4, 5, 6, 7, 8, 9);

foreach ($array as $value){

    if($value%3==0){
        echo $value.PHP_EOL;
    }
    else{
        echo $value.", ";
    }
}