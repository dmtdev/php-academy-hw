<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08.11.2017
 * Time: 14:12
 */

/**
 * @param $entryCount
 * @param $currentPage
 * @param int $entryPerPage
 * @return array
 */
function buildPagination($entryCount, $currentPage, $entryPerPage = 5)
{
    $getParams = buildGetParams(['page_num']);
    $pageCount = ceil($entryCount / $entryPerPage);
    $pages = [];
    for ($i = 1; $i <= $pageCount; $i++) {
        $pages[$i]['params'] = '?' . $getParams . '&page_num=' . $i;
        if ($i == $currentPage) {
            $pages[$i]['current'] = true;
        } else {
            $pages[$i]['current'] = false;
        }
    }
    return $pages;
}

/**
 * @param $params
 * @return string
 */
function buildGetParams($params = [])
{
    $get = $_GET;
    foreach ($params as $v) {
        unset($get[$v]);
    }
    $getParams = [];
    foreach ($get as $k => $v) {
        $getParams[] = $k . '=' . $v;
    }
    return join('&', $getParams);
}

function buildOptions()
{
    $options = [];
    $categoryResult = categoryList();
    while ($category = mysqli_fetch_assoc($categoryResult)) {
        $options[$category['id']] = $category['title'];
    }
    return $options;
}