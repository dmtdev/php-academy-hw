<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 10/16/17
 * Time: 19:42
 */
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Admin Area"');
    header('HTTP/1.0 401 Unauthorized');
    die();
} elseif ($_SERVER['PHP_AUTH_USER'] == 'admin' && $_SERVER['PHP_AUTH_PW'] == 'admpwd') {

    include_once 'index.php';
//    include_once('lib/core.php');
//    $incPath = $_SERVER['DOCUMENT_ROOT'] . '/05_practice_store/inc/admin';
//
//    $page = 'main';
//
//    if (isset($_GET['page'])) {
//        $page = str_replace('/', '', $_GET['page']);
//    }
//
//
//    ob_start();
//
//    include($incPath . '/header.php');
//
//    if (!include($incPath . "/$page.php")) {
//        echo '404';
//    }
//
//    include($incPath . '/footer.php');
//
//
//    echo ob_get_clean();

}
