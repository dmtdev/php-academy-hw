<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 26.09.2017
 * Time: 22:49
 */
define('DS', DIRECTORY_SEPARATOR);
$base = $_SERVER['DOCUMENT_ROOT'];
$serverUrl = $_SERVER['REQUEST_URI'];
$rename_form = false;
$edit_form = false;
$host = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'];
$script = $_SERVER['SCRIPT_NAME'];

//TODO: fix it..
// так делать нельзя.....
$filesDir = explode('/',$script);
unset($filesDir[count($filesDir)-1]);
$filesDir = str_replace('//','/',join('/',$filesDir));
// так делать нельзя.....

$mimeFirstPartDir = ['image' => 'gallery_files', 'text' => 'txt', 'video' => 'video', 'audio' => 'audio',];
$mimeByExtensionDir = [
    'doc' => [
        'doc', 'docx', 'xls', 'xlsx', 'pdf', 'ods', 'ots',
    ]
];
$anotherMime = 'application';

function removeDir($path)
{
    if (is_dir($path)) {
        $files = array_diff(scandir($path), ['.', '..']);
        foreach ($files as $value) {
            $newPath = $path . DS . $value;
            if (is_dir($newPath)) {
                removeDir($newPath);
            } else {
                unlink($newPath);
            }
        }
    } else {
        unlink($path);
    }
    rmdir($path);
}

function getFileDirs($uplDirPath)
{
    $tmpDirs = [];
    $dirList = array_diff(scandir($uplDirPath), ['.', '..', 'gallery_files']);
    foreach ($dirList as $value) {
        if (is_dir($uplDirPath . DS . $value)) {
            $tmpDirs[] = $value;
        }
    }
    return $tmpDirs;
}

function getFiles($dirList)
{
    $result = [];
    foreach ($dirList as $value) {
        foreach (array_diff(scandir($value), ['.', '..']) as $value2) {
            $result[$value][] = $value2;
        }
    }
    return $result;
}