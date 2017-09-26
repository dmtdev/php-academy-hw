<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 9/20/17
 * Time: 18:41
 * @param $uplDirPath
 * @return array
 */

// Тут делаем проверку на mime-type == image/...
// Если все ок - перемещаем загруженную картинку в свою директорию
//        $uplDir = explode("/", $file['type'])[0];
//        if (!is_dir($uplDir)) {
//            mkdir($galleryDir . DS . $uplDir);
//        }
//        move_uploaded_file(
//            $file['tmp_name'],
//            $galleryDir . DS . $uplDir . DS . $file['name']
//        );

include 'inc.php';
// Определим где мы будет хранить картинки
$uplDirPrefix = __DIR__ . DS;
$galleryDir = '';
$imgDir = $uplDirPrefix . 'gallery_files';
// Если директория не создана - создаем
$errors = [];
//$mimeFirstPartDir = ['image' => 'img', 'text' => 'txt', 'video' => 'video', 'audio' => 'audio',];
//'image' => 'gallery_files' пусть будет одна галерея

$uplDir = '';

// Логика обработки запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['image'];
    if (file_exists($file['tmp_name'])) {
        if (array_key_exists(explode("/", $file['type'])[0], $mimeFirstPartDir)) {
            $uplDir = $mimeFirstPartDir[explode("/", $file['type'])[0]];
        } else if (!$uplDir) {
            foreach ($mimeByExtensionDir as $key => $value) {
                if (in_array(pathinfo($file['name'], PATHINFO_EXTENSION), $value)) {
                    $uplDir = $value;
                }
            }
            if (!$uplDir) {
                $uplDir = $anotherMime;
            }
        }
        if ($uplDir) {
            $galleryDir = $uplDirPrefix . DS . $uplDir;
            if (!file_exists($galleryDir)) {
                mkdir($galleryDir);
            }
            move_uploaded_file(
                $file['tmp_name'],
                $galleryDir . DS . $file['name']
            );

        }

    }


}

// Получаем список файлов директории и очищаем от лишних элементов
//var_dump($imgDir);
$images = array_diff(scandir($imgDir), ['.', '..']);
$dirs = getFileDirs($uplDirPrefix);
//var_dump($dirs);

$res = getFiles($dirs);

var_dump($res);

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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Загрузите свои картинки</h1>
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?= implode('<br>', $errors) ?>
                </div>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="image" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">
                    Отправить
                </button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php
                foreach ($images as $imgPath): ?>
                    <div class="col-md-6"
                         style="height: 250px;
                                 background: url('get_img.php?name=<?= $imgPath ?>') no-repeat center/cover"
                    >
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        foreach ($res as $key => $value){
            echo $key . '=>' . print_r($value,1)."<br /> ";
        }
        ?>
    </div>
</div>
</body>
</html>