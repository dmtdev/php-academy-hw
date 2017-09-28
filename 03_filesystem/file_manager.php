<?php
/**
 * Created by PhpStorm..
 * User: gendos
 * Date: 9/20/17
 * Time: 18:42
 */
date_default_timezone_set('Europe/Kiev');

// Определим корневую директорию
include('inc.php');

// Определяем путь выбранной директории относительно корня
$path = '';
$dir = '';
if (!empty($_GET['dir']) && !in_array($_GET['dir'], ['.', '/', '\\'])) {
    $path = $_GET['dir'];
}

//удаление и переименование
$errors = [];
if (isset($_GET['action']) && isset($_GET['name'])) {
    switch ($_GET['action']) {
        case 'delete': {
            removeDir($base . $path . DS . $_GET['name']);
            header('Location: ' . $host . $script . '?dir=' . $path);
            break;
        }
        case 'rename': {
            if (!isset($_POST['new_name'])) {
                $rename_form = true;
                break;
            } else {
                if (file_exists($base . $path . DS . $_POST['new_name'])) {
                    $errors[] = "Файл или директория " . $_POST['new_name'] . " уже существует.";
                } else {
                    rename($base . $path . DS . $_GET['name'], $base . $path . DS . $_POST['new_name']);
                    header('Location: ' . $host . $script . '?dir=' . $path);
                }
            }
            break;
        }
        case 'edit': {
            if (!isset($_POST['new_content'])) {
                $edit_form = true;
                break;
            } elseif (!file_exists($base . $path . DS . $_GET['name'])) {
                $errors[] = "Файл не существует.";
                break;
            } else {
                $fp = fopen($base . $path . DS . $_GET['name'], 'r+');
                fwrite($fp, $_POST['new_content']);
                fclose($fp);
                header('Location: ' . $host . $script . '?dir=' . $path);
            }
            break;
        }
        default: {
            break;
        }
    }
}
//удаление и переименование

// Получаем все файлы и директории из текущего пути
$files = scandir($base . DS . $path);
// Очищаем от лишних элементов
$removeParts = ['.'];

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
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?= implode('<br>', $errors) ?>
            </div>
        <?php endif; ?>
        <div class="col-md-12">
            <?php if ($rename_form): ?>
                <form method="post" action="<?= $serverUrl ?>" enctype="multipart/form-data">
                    <input type="text" name="new_name" value="<?= $_GET['name'] ?>">
                    <input type="submit" value="переименовать">
                </form>
            <?php endif ?>
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
                                $editLink = '| <a href="' . $serverUrl . '&action=edit&name=' . $file['name'] . '">edit</a>';
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
            <?php if ($edit_form): ?>
                <form method="post" action="<?= $serverUrl ?>" enctype="multipart/form-data">
                    <textarea rows="10" cols="100"
                              name="new_content"><?php echo file_get_contents($base . $path . DS . $_GET['name']) ?></textarea><br/>
                    <input type="submit" value="сохранить">
                </form>
            <?php endif ?>
        </div>
    </div>
</div>
</body>
</html>