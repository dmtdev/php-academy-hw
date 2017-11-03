<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 9/27/17
 * Time: 19:39
 */
session_start();
define('DS', DIRECTORY_SEPARATOR);
ini_set('display_errors', 1);
$config = require 'config' . DS . 'global.php';
ob_start();

$page = 'main';
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
              integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
              crossorigin="anonymous">
        <title><?= $config['pages'][$page]['title'] ?></title>
    </head>
    <body>
    <?php

    // Если человек не авторизован - показываем форму входа
    if (!isset($_SESSION['auth']) || $_SESSION['auth'] == false) {
        if ($config['pages'][$page]['private']) {
            $page = 'auth';
        }
    }
    $parts = [
        'header',
        $page,
        'footer',
    ];
    foreach ($parts as $part) {
        ob_start();
        include 'inc' . DS . $part . '.php';
        if ($_SESSION['auth']['state']) {
            $partContent = str_ireplace(
                '{{basket}}',
                "В корзине 3 товара",
                ob_get_clean()
            );
        } else {
            $partContent = str_ireplace(
                '{{basket}}',
                "",
                ob_get_clean()
            );
        }

        echo $partContent;
    }
    ?>
    </body>
    </html>
<?php
$pageContent = '';
if ($_SESSION['auth']['state']) {
    $pageContent = str_ireplace(
        '{{login}}',
        'Привет, ' . $_SESSION['auth']['login'],
        ob_get_clean()
    );
} else {
    $pageContent = str_ireplace(
        '{{login}}',
        '',
        ob_get_clean()
    );
}
echo $pageContent;