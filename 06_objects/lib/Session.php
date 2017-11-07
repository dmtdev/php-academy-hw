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

    }

    public function getVar($name)
    {

    }
}

$s = new Session();

var_dump($_SESSION);
