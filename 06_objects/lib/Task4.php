<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.11.2017
 * Time: 11:04
 */

class Task4
{
private $name;
private $salary;

    /**
     * Task4 constructor.
     * @param $name
     * @param $salary
     */
    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }



}