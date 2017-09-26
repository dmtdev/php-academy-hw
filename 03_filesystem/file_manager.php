<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 9/20/17
 * Time: 18:42
 */
date_default_timezone_set('Europe/Kiev');

define('DS', DIRECTORY_SEPARATOR);


function removeDir(&$path)
{
    if (is_dir($path)) {
        $files = array_diff(scandir($path), ['.', '..']);
        if (count($files) == 0) {
            //echo 'delete' . $path . PHP_EOL;
            rmdir($path);
        } else {
            foreach ($files as $value) {
                $newPath = $path . DS . $value;
                removeDir($newPath);
            }
        }
    }
    else{
        unlink($path);
    }
    //echo 'delete' . $path . PHP_EOL;

}

// Определим корневую директорию
$base = $_SERVER['DOCUMENT_ROOT'];
$serverUrl = $_SERVER['REQUEST_URI'];


// Определяем путь выбранной директории относительно корня
$path = '';
if (!empty($_GET['dir']) && !in_array($_GET['dir'], ['.', '/'])) {
    $path = $_GET['dir'];
}
// Получаем все файлы и директории из текущего пути
$files = scandir($base . DS . $path);
// Очищаем от лишних элементов
$removeParts = ['.'];

//удаление и переименование
if (isset($_GET['action']) && in_array($_GET['action'], array("rename", "delete")) && isset($_GET['name'])) {
    if (isset($_GET['dir'])) {
        $dir = str_replace('\\', DS, $_GET['dir']);
    }
    $filePath = $base . $dir . DS . $_GET['name'];
    if ($_GET['action'] == 'delete') {
        removeDir($filePath);
    }

}
//удаление и переименование

$is_file = true;
$is_editable = false;
$is_removable = true;
$dirName = '';
$editableExtensions = ['txt', 'php'];
if (!$path) {
    // Если мы в корне - удаляем элемент родительской директории
    $removeParts[] = '..';
}
$files = array_diff($files, $removeParts);
// Формируем данные для вывода
$result = [];
foreach ($files as $file) {
    $name = $file;
    $absFile = $base . DS . $path . DS . $file;
    // Для директорий делаем имя со ссылкой
    if (is_dir($absFile)) {
        $is_file = false;
        if ($file == '..') {
            // Ссылку "вверх" делаем на один элемент вложенности меньше
            $url = dirname($path);
            $is_removable = false;
        } else {
            $url = $path . DS . $name;
        }
        $dirName = $name;
        echo $url.'<br>';
        $name = "<a href=\"?dir={$url}\">{$name}</a>";
    }
    if ($is_file) {
        $info = new SplFileInfo($absFile);
        if (in_array($info->getExtension(), $editableExtensions)) {
            $is_editable = true;
        }
    }
    // Добавляем текущий элемент в массив результата
    $result[] = [
        'name' => $name,
        'dir_name' => $dirName,
        'size' => round(filesize($absFile) / 1024, 2) . ' кб',
        'created_at' => date('H:i:s d.m.Y', filectime($absFile)),
        'modified_at' => date('H:i:s d.m.Y', filemtime($absFile)),
        'is_file' => $is_file,
        'is_editable' => $is_editable,
        'is_removable' => $is_removable,
    ];
    $is_removable = true;
    $is_editable = false;
    $is_file = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <title>File Manager</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover" width="100">
                <thead>
                <tr class="bg-warning">
                    <th>Действия</th>
                    <th>Имя файла</th>
                    <th>Размер файла</th>
                    <th>Дата создания</th>
                    <th>Дата последнего изменения</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($result as $file): ?>
                    <tr>
                        <td>
                            <?php if ($file['is_editable']) {
                                $editLink = '| <a href="#">edit</a>';
                            } else {
                                $editLink = '';
                            }
                            if ($file['is_removable']) {
                                $links = '<a href="' . $serverUrl . '&action=rename&name=' . ($file['is_file'] ? $file['name'] : $file['dir_name']) . '">rename</a> |';
                                $links .= ' <a href="' . $serverUrl . '&action=delete&name=' . ($file['is_file'] ? $file['name'] : $file['dir_name']) . '">delete</a>';
                            } else {
                                $links = '';
                            }
                            ?>
                            <?= $links ?>
                            <?= $editLink ?>
                        </td>
                        <td><?= $file['name'] ?></td>
                        <td><?= $file['size'] ?></td>
                        <td><?= $file['created_at'] ?></td>
                        <td><?= $file['modified_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>