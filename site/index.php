<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 9/27/2017
 * Time: 7:39 PM
 */
defined("DS", DIRECTORY_SEPARATOR);
$menu = [
    [
        'link' => 'products',
        'title' => 'Продукты'
    ], [
        'link' => 'contacts',
        'title' => 'Контакты'
    ],
]
?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">

        <title>Company</title>
    </head>
    <body>
    <div class="container">
        <?php include 'inc' . DS . 'header.php'; ?><
        <?php include 'inc' . DS . 'footer.php'; ?><
        <?php include 'inc' . DS . 'footer.php'; ?><


    </div>
    </body>
    </html>