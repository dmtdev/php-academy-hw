<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 07.09.2017
 * Time: 20:06
 */
$sum = 0;

if (count($argv) > 1) {
    $input = (int)$argv[1];
    if (is_int($input) and $input != 0) {
        $resultDigits = array();
        while ($input % 10 > 0 or $input / 10 > 0) {
            $remainder = $input % 10;
            $resultDigits[] = $remainder;
            $input = ($input - $remainder) / 10;
        }
        for ($i = 0; $i < count($resultDigits); $i++) {
            $sum += $resultDigits[$i];
        }
        echo $sum;
    } else {
        echo "Input integer argument";
    }
}