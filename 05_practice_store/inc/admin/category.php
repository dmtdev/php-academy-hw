<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 10/16/17
 * Time: 19:58
 */


if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $data = [];

    if (strlen($title)) {
        $data['title'] = $title;
    }

    if (!empty($data)) {
        if ($id > 0) {
            $result = updateCategory($id, $data);
        } else {
            $result = createCategory($data);
        }
    }
}

$action = (isset($_GET['action']) ? $_GET['action'] : null);
$id = (isset($_GET['id']) ? $_GET['id'] : null);
if ($action == 'delete') {
    if (!deleteCategory($id)) {
        $errors[] = 'Can\'t delete an entry, possibly not empty Category';
    }
}

$currentPage = (isset($_GET['page_num']) ? $_GET['page_num'] : 1);
$categoryResult = categoryList(null, $currentPage);
$pagination = buildPagination(countCategories(), $currentPage, $categoryPerPage);
$errors = [];


if (count($errors)) {
    $errors = join('<br />', $errors); ?>
    <div>Errors:<br/><?= $errors ?></div>
    <?php
}
?>

<div>
    <a href="?page=category&id=0">Добавить категорию</a>
    <?php if (isset($id) && !$action) {
        $title = '';
        if ($id > 0) {
            $category = mysqli_fetch_assoc(categoryList($id));
            $title = $category['title'];
        }

        ?>
        <form action="?page=category" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" value="<?= $title ?>"
                   placeholder="Название категории" name="title">
            <input type="submit" name="save" value="Сохранить">
        </form>
    <?php } ?>
    <ul>
        <?php

        while ($category = mysqli_fetch_assoc($categoryResult)) {
            ?>
            <li>
                <a href="?page=category&id=<?= $category['id'] ?>">
                    <?= $category['id'] ?>: <?= $category['title'] ?></a>

                <a href="?page=category&id=<?= $category['id'] ?>&action=delete">
                    [x]</a>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
<div>Страницы:
    <?php foreach ($pagination as $k => $v): ?>
        <?php if ($v['current']): ?>
            <b><?= $k ?></b>
        <?php else: ?>
            <a href="<?= $v['params'] ?>"><?= $k ?></a>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
