<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 19.09.2017
 * Time: 17:17
 */
date_default_timezone_set("Europe/Kiev") ;
$filename = __DIR__ . '/data.txt';
$censoredFilename = __DIR__ . '/censored.txt';
// Массив содержит все комментарии
$comments = unserialize(file_get_contents($filename));
// Слова которые мы должны фильтровать
$censored = explode(
    PHP_EOL,
    file_get_contents($censoredFilename)
);
// Строка с сообщением об ошибка
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Логика оработки запроса
    $author = htmlspecialchars($_POST['author']);
    $email = htmlspecialchars($_POST['email']);
    $comment = htmlspecialchars($_POST['comment']);

    if (strlen($author) && strlen($comment) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        foreach ($comments as $value) {
            if (array_key_exists('email', $value) && $value['email'] == $email) {
                $errors[] = "Человек с такиим e-mail уже заполнял форму!";
            }
        }
    } else {
        $errors[] = "Форма заполнена некорректно";
    }
    array_unique($errors);
    if (!count($errors)) {
        $comments[] = [
            'date' => date('H:i:s d.m.Y'),
            'timestamp' => time(),
            'author' => $author,
            'comment' => $comment,
            'email' => $email,
        ];
        file_put_contents($filename, serialize($comments));
        header('Location: ' . $_SERVER['PHP_SELF']);
    }
}
foreach ($comments as $key => $value){
    if(!isset($value['timestamp'])){
        // +(3*60*30) - не настроил зону в php.ini
        $comments[$key]['timestamp'] = strtotime($comments[$key]['date'])+(3*60*30);
    }
}
usort($comments, function ($a, $b) {
        return ((isset($a['timestamp']) && isset($b['timestamp']))  && $a['timestamp'] > $b['timestamp']) ? -1 : 1;
});
// Постраничная навигация
$commentsPerPage = 5;
$currentPage = 1;
$pagesCounter = ceil(count($comments) / $commentsPerPage) + 1;
if (isset($_GET['p']) && (int)$_GET['p'] > 1) {
    $currentPage = (int)$_GET['p'];

}
// Вырезать нужные комментарии из $comments
//foreach ($comments as $key => $value) {
//    if (($key) < ($currentPage - 1) * $commentsPerPage or ($key) > (($currentPage - 1) * $commentsPerPage) + 4) {
//        unset($comments[$key]);
//    }
//}

$comments= array_slice($comments,($currentPage-1)*$pagesCounter,5);
?>
<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">

        <title>Comments</title>
    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>Поделитесь вашим мнением</h2>

                <? if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?= implode('<br>', $errors) ?>
                    </div>
                <? endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="author">Ваше имя:</label>
                        <input type="text" class="form-control"
                               name="author" id="author" required
                               placeholder="Имя пишите здесь">
                        <label for="email">Ваш e-mail:</label>
                        <input type="email" class="form-control"
                               name="email" id="email" required
                               placeholder="E-mail пишите здесь">

                    </div>

                    <div class="form-group">
                        <label for="comment">Ваше мнение:</label>
                        <textarea name="comment" class="form-control"
                                  id="comment"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Отправить
                    </button>
                </form>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <?php
                // Вывод комметариев
                foreach ($comments as $comment):
                    // Убираем нежелательные слова из полей
                    foreach (['author', 'comment'] as $key):
                        $comment[$key] = str_ireplace(
                            $censored,
                            '[censored]',
                            $comment[$key]
                        );
                    endforeach;
                    ?>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <?php
                            if (isset($comment['email'])) {
                                echo '<a href="mailto:' . $comment['email'] . '">' . $comment['author'] . '</a>';
                            } else {
                                echo $comment['author'];
                            }
                            ?>
                            <span><?= $comment['date'] ?></span>
                        </div>
                        <div class="panel-body">
                            <?= $comment['comment'] ?>
                        </div>
                    </div>
                    <hr>
                    <?php
                endforeach;
                // Вывод ссылок постраничной навигации
                ?>
                <div class="pagination">
                    <?php if ($pagesCounter > 1) {
                        for ($i = 1; $i < $pagesCounter; $i++) {
                            echo '<a href="?p=' . $i . '">' . $i . ' </a>';
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>