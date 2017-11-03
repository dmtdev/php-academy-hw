<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.11.2017
 * Time: 15:15
 */

class Student extends User
{
    private $class;
    private $grant;

    public function __construct($name, $age,$class,$grant)
    {
        parent::__construct($name, $age);
        $this->grant=$grant;
        $this->class=$class;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getGrant()
    {
        return $this->grant;
    }

    /**
     * @param mixed $grant
     */
    public function setGrant($grant)
    {
        $this->grant = $grant;
    }


}