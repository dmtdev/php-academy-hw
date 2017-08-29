<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.08.2017
 * Time: 13:16
 */
$age = 30;

if ($age >= 18 and $age <= 59) {
    echo "Вам еще работать и работать..";
} elseif ($age > 59) {
    echo "Вам пора на пенсию.";
} elseif ($age >= 0 and $age <= 17) {
    echo "Вам еще работать и работать..";
}