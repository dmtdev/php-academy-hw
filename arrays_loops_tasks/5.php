<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.09.2017
 * Time: 15:51
 */

$array = array(
    'Коля' => 200,
    'Вася' => 300,
    'Петя' => 400
);


foreach ($array as $key => $value) {
    echo $key . " &mdash; зарплата " . $value . "<br />" . PHP_EOL;
}
