<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 07.09.2017
 * Time: 20:03
 */

for ($i = 1; $i < 10; $i++) {
    echo join("", array_fill(0, $i, $i)) . PHP_EOL;
}