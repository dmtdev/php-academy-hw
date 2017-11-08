<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.11.2017
 * Time: 17:24
 */

class Cookie
{
    public function set($name, $value = '')
    {
        setcookie($name, $value);
    }

    public function get($name)
    {
        if (isset($_COOKIE[$name])) {
            return $_COOKIE[$name];
        }
        return false;
    }

    public function del($name)
    {
        setcookie($name, $_COOKIE[$name], time() - 3600);
    }
}