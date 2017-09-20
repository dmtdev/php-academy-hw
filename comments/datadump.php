<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 19.09.2017
 * Time: 17:40
 */
$filename = __DIR__.'/data.txt';
$comments = unserialize(file_get_contents($filename));
usort($comments, function ($a, $b) {
    return (isset($a['timestamp']) && $a['timestamp'] > $b['timestamp']) ? -1 : 1;
});
var_dump($comments);