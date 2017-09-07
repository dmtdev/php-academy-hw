<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 07.09.2017
 * Time: 19:43
 */

$months = array( "Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь");
$month = "сентябрь";

foreach ($months as $value){
    if($value == $months){
        echo "<b>".$value."</b><br />";
    }
    else{
        echo $value."<br />";
    }
}