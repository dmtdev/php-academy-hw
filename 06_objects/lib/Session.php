<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.11.2017
 * Time: 17:25
 */

class Session
{
    private $sessionName;

    public function __construct($name = 'mySession')
    {
        $this->sessionName = $name;
        session_name($this->sessionName);
        session_start();
    }

    public function setVar($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function getVar($name)
    {
        return $_SESSION[$name];
    }

    public function delVar($name)
    {
        if ($this->isSetVar($name)) {
            unset($_SESSION[$name]);
        }
    }

    public function isSetVar($name)
    {
        return isset($_SESSION[$name]);
    }
}