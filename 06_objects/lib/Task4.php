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
private $age;

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Task4 constructor.
     * @param $name
     * @param $salary
     * @param $age
     */
    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->age = $age;
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