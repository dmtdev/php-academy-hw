<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 05.09.2017
 * Time: 20:10
 */

$upperCount = 0;
$lowerCount = 0;
$string = "Lorem ipsum dolor sit amet, consectetur adipiscing";
$tmpString = preg_replace('/[^a-z\s\-]/i', '', $string);

$upperCount = 0;
$lowerCount = 0;
$letters = range('a', 'z');
$string = "Lorem ipsum dolor sit amet, consectetur adipiscing";
$tmpString = preg_replace('/[^a-z\s\-]/i', '', $string);

for ($i = 0; $i < strlen($tmpString); $i++) {
    if (in_array(strtolower($tmpString[$i]), $letters)) {
        $lowerCount++;
    } else {
        $upperCount++;
    }
}