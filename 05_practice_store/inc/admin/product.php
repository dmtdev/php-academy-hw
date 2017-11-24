<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 10/16/17
 * Time: 19:59
 */

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = (float)$_POST['price'];
    $category = $_POST['category'];
    $data = [];

    if (strlen($title)) {
        $data['title'] = $title;
    }
    $data['category_id'] = (int)$category;
    $data['price'] = $price;

    if (!empty($data)) {
        if ($id > 0) {
            $result = updateProduct($id, $data);
        } else {
            $result = createProduct($data);
        }
    }
}
$action = (isset($_GET['action']) ? $_GET['action'] : null);
$id = (isset($_GET['id']) ? $_GET['id'] : null);
if ($action == 'delete'){
    if(!deleteProduct($id)){
        $errors[] = 'Can\'t delete this proruct';
    }
}


$categoryId = (isset($_GET['category_id']) ? $_GET['category_id'] : null);
$currentPage = (isset($_GET['page_num']) ? $_GET['page_num'] : 1);
$productResult = false;
$pagination = [];
if ($categoryId) {
    $productResult = productList(null, $currentPage, $categoryId);
    $pagination = buildPagination(countProducts($categoryId), $currentPage, $categoryPerPage);
}
$errors = [];
$options = buildCategoriesOptions();


?>
<div>
    <a href="?page=product&id=0">Добавить продукт</a>
    <div>Выберите категорию:<br>
        <form action="" method="get">
            <input type="hidden" name="page" value="product">
            <select name="category_id">
                <?php foreach ($options

                               as $k => $v): ?>
                    <option value=<?= ($k == $categoryId ? ($k . ' selected') : $k . '') ?>><?= $v ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="выбрать">
        </form>
    </div>
    <?php if (isset($id) && !$action) {
        $title = '';
        $price = null;
        $category = 0;
        if ($id > 0) {
            $product = mysqli_fetch_assoc(productList($id));
            $title = $product['title'];
            $price = $product['price'];
            $category = $product['category_id'];
        }

        ?>
        Добавить/изменить продукт:<br>
        <form action="?page=product" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" value="<?= $title ?>" placeholder="Название продукта" name="title"><br>
            <input type="text" value="<?= $price ?>" placeholder="Цена" name="price"><br>
            <select name="category">
                <?php foreach ($options

                               as $k => $v): ?>
                    <option value=<?= ($k == $category ? ($k . ' selected') : $k) ?>><?= $v ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="save" value="Сохранить">
        </form>
    <?php } ?>
    <ul>
        <?php
        if ($productResult) {
            while ($product = mysqli_fetch_assoc($productResult)) {
                ?>
                <li>
                    <a href="?page=product&id=<?= $product['id'] ?>">
                        <?= $product['id'] ?>: <?= $product['title'] ?></a> $<?= $product['price'] ?>

                    <a href="?page=product&id=<?= $product['id'] ?>&action=delete&category_id=<?= $product['category_id'] ?>">
                        [x]</a>
                </li>
                <?php
            }
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

