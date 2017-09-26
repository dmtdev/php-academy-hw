<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 22.09.2017
 * Time: 22:10
 */

//extension=php_fileinfo.dll; - почему-то не подключается..
define('DS', DIRECTORY_SEPARATOR);
define('GALLERY_FILES', '03_filesystem' . DS . 'gallery_files');
$galleryDir = $_SERVER['DOCUMENT_ROOT'] . DS . GALLERY_FILES . DS;
//echo $galleryDir; die();
if (isset($_GET['name']) && file_exists($galleryDir . $_GET['name'])) {
    //if (explode("/", mime_content_type($galleryDir . $_GET['name']))[0] == 'image') {
    $info = new SplFileInfo($galleryDir . $_GET['name']);
    $fileExtension = strtolower($info->getExtension());
    $contentType = "";
    switch ($fileExtension) {
        case "gif":
            $contentType = "image/gif";
            break;
        case "png":
            $contentType = "image/png";
            break;
        case "jpeg":
        case "jpg":
            $contentType = "image/jpeg";
            break;
        default:
            $contentType = "application/octet-stream";
            break;
    }
    header("Content-type: ".$contentType);
    readfile($galleryDir . $_GET['name']);
    //}
}

