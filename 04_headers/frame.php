<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 27.09.2017
 * Time: 13:23
 */
define('DS', DIRECTORY_SEPARATOR);
if (isset($_COOKIE['file_name'])) {
    //header('X-Frame-Options: SAMEORIGIN');
    header('Content-Disposition: attachment; filename="' . $_COOKIE['file_name'].'"');
    readfile(__DIR__ . DS . $_COOKIE['file_name']);
}