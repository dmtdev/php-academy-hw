<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 10/16/17
 * Time: 19:08
 */
include_once('lib/core.php');

$inc = [
    'index.php'=>'public',
    'admin.php'=>'admin'
];
$script = explode('/',$_SERVER['PHP_SELF']);
$script = $script[count($script)-1];

$incPath = $_SERVER['DOCUMENT_ROOT'].'/05_practice_store/inc/'.$inc[$script];

$page = 'main';

if (isset($_GET['page'])) {
    $page = str_replace('/', '', $_GET['page']);
}


ob_start();


include($incPath.'/header.php');

if (!include($incPath."/$page.php")) {
    echo '404';
}

include($incPath.'/footer.php');


echo ob_get_clean();