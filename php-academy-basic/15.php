<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.08.2017
 * Time: 14:01
 */
$a = 10;
$b = 0;
$operator = '%';
if ($b == 0 and ($operator == '/' or $operator == '%')) {
    echo "На ноль делить нельзя";
} else {
    eval('echo ' . $a . $operator . $b . ' ;');
}