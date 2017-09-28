<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 27.09.2017
 * Time: 13:21
 */
define("DS",DIRECTORY_SEPARATOR);
$visits_count = 0;
$time = 0;
if (isset($_COOKIE['visits_count'])) {
    $visits_count = $_COOKIE['visits_count'];
} else {
    $visits_count = 0;
}
if ($visits_count > 5) {
    $time = 1;
} else {
    $visits_count++;
    $time = time() + 60 * 60 * 24;
}

setcookie("visits_count",
    $visits_count,
    $time,
    "/",
    'localhost',
    false,
    true
);
if (count($_FILES)) {
    $file = $_FILES['file'];
    if (file_exists($file['tmp_name'])) {
        move_uploaded_file(
            $file['tmp_name'],
            __DIR__ . DS . $file['name']
        );
        setcookie("file_name",
            $file['name'],
            time() + 24 * 60 * 60,
            "/",
            'localhost',
            false,
            true
        );
        header('Content-Disposition: attachment; filename="' . $file['name'].'"');
        readfile(__DIR__ . DS . $file['name']);

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <title>Gallery</title>
</head>
<body>
visits_count: <?= $visits_count ?>
<br/>
<form method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
    <div class="form-group">
        <input type="file" name="file" required class="form-control" maxlength="2000000">
    </div>
    <button type="submit" class="btn btn-primary">
        Отправить
    </button>
</form>
<!--<iframe src="frame.php"></iframe>-->
</body>
</html>

