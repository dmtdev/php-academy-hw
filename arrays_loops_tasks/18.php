<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 07.09.2017
 * Time: 19:48
 */
$days = array("Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье");

foreach ($days as $key => $value) {
    if ($key == 5 or $key == 6) {
        echo "<b>" . $value . "</b><br />";
    } else {
        echo $value . "<br />";
    }
}