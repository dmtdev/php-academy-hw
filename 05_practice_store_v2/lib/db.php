<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 10/16/17
 * Time: 20:02
 */


$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'goods';

$connection = mysqli_connect(
    $dbHost,
    $dbUser,
    $dbPassword,
    $dbName
);
$connection->query('SET NAMES utf8;');
$connection->query('SET CHARSET utf8;');

$tablesMap = [
    'category' => 'category',
    'product' => 'product',
];


/** Get entity */

/**
 * @param null $id
 * @return bool|mysqli_result
 */
function categoryList($id = null, $page = null)
{
    global $categoryPerPage;
    return getList($GLOBALS['tablesMap']['category'], $id, $page, $categoryPerPage);
}


/**
 * @param null $id
 * @param null $page
 * @param $categoryId
 * @return bool|mysqli_result
 */
function productList($id = null, $page = null, $categoryId = null)
{
    global $productPerPage;
    return getList($GLOBALS['tablesMap']['product'], $id, $page, $productPerPage, $categoryId);
}

/**
 * @param $tableName
 * @param null $id
 * @param null $page
 * @return bool|mysqli_result
 */
function getList($tableName, $id = null, $page = null, $itemsPerPage = 5, $categoryId = null)
{
    global $connection;

    $where = [];
    $limit = '';
    if ($id > 0) {
        $where[] = ' id = ' . $id . ' ';
    }
    if ($categoryId) {
        $where[] = ' category_id = ' . $categoryId . ' ';
    }

    if ($page) {
        $limit = ' limit ' . (($page - 1) * $itemsPerPage) . ', ' . $itemsPerPage;
    }

    if (count($where)) {
        $where = ' WHERE ' . join(' AND ', $where);
    } else {
        $where = '';
    }

    $result = mysqli_query(
        $connection,
        "SELECT * FROM $tableName $where $limit;"
    );
    return $result;
}


/** Create entity */

/**
 * @param $fields
 * @return bool|mysqli_result
 */
function createCategory($fields)
{
    return createEntity(
        $GLOBALS['tablesMap']['category'],
        $fields
    );
}

/**
 * @param $fields
 * @return bool|mysqli_result
 */
function createProduct($fields)
{
    return createEntity(
        $GLOBALS['tablesMap']['product'],
        $fields
    );
}

/**
 * @return mixed
 */
function countCategories()
{
    return countEntry(
        $GLOBALS['tablesMap']['category']
    );
}

/**
 * @param $categoryId
 * @return mixed
 */
function countProducts($categoryId)
{
    return countEntry(
        $GLOBALS['tablesMap']['product'],
        'id',
        ['category_id' => $categoryId]
    );
}


/**
 * @param $tableName
 * @param $data
 * @return bool|mysqli_result
 */
function createEntity($tableName, $data)
{
    global $connection;

    foreach ($data as &$val) {
        $val = mysqli_escape_string($connection, $val);
    }

    $cols = implode(',', array_keys($data));
    $values = "'" . implode("','", $data) . "'";
    return mysqli_query(
        $connection,
        "INSERT INTO $tableName ($cols) VALUES ($values)"
    );
}

/** Update entity */

/**
 * @param $id
 * @param $data
 * @return bool|mysqli_result
 */
function updateCategory($id, $data)
{
    return updateEntity(
        $GLOBALS['tablesMap']['category'],
        $id,
        $data
    );
}

/**
 * @param $id
 * @param $data
 * @return bool|mysqli_result
 */
function updateProduct($id, $data)
{
    return updateEntity(
        $GLOBALS['tablesMap']['product'],
        $id,
        $data
    );
}

/**
 * @param $id
 * @return bool|mysqli_result
 */
function deleteCategory($id)
{
    $result = deleteEntity($GLOBALS['tablesMap']['category'],
        $id
    );
    return $result;
}

/**
 * @param $id
 * @return bool|mysqli_result
 */
function deleteProduct($id)
{
    $result = deleteEntity($GLOBALS['tablesMap']['product'],
        $id
    );
    return $result;
}

/**
 * @param $tableName
 * @param $id
 * @param $data
 * @return bool|mysqli_result
 */
function updateEntity($tableName, $id, $data)
{
    global $connection;

    $values = [];

    foreach ($data as $key => $val) {
        $val = mysqli_escape_string($connection, $val);
        $values[] = "$key = '$val'";
    }

    $values = implode(',', $values);

    return mysqli_query(
        $connection,
        "UPDATE $tableName SET $values WHERE id = $id;"
    );
}

/**
 * @param $tableName
 * @param $id
 * @return bool|mysqli_result
 */
function deleteEntity($tableName, $id)
{
    global $connection;
    return mysqli_query(
        $connection,
        'DELETE FROM ' . $tableName . ' WHERE id =' . $id
    );
}

/**
 * @param $tableName
 * @param string $fieldName
 * @param array $params
 * @return mixed
 */

function countEntry($tableName, $fieldName = 'id', $params = [])
{
    global $connection;
    $where = '';
    if (count($params)) {
        $where = [];
        foreach ($params as $k => $v) {
            $where[] .= ' ' . $k . '=' . $v . ' ';
        }
        $where = ' WHERE ' . join(' AND ',$where);
    }
    $result = mysqli_query($connection,
        'SELECT count(' . $fieldName . ') as c from ' . $tableName.$where);
    $result = mysqli_fetch_array($result);
    return $result['c'];
}