<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 07.09.2017
 * Time: 19:53
 */

$days = array("Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье");
$day = "Четверг";

foreach ($days as $value) {
    if ($value == $day) {
        echo "<i>" . $value . "</i><br />";
    } else {
        echo $value . "<br />";
    }
}