<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 05.09.2017
 * Time: 20:10
 */
function recursiveToNum($n) {
    if ($n != 0) {
        recursiveToNum(--$n);
        echo $n + 1 . " ";
    }
}

recursiveToNum(100);