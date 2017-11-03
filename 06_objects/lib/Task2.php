<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.11.2017
 * Time: 10:47
 */

class Task2
{
    private $name;
    private $age;
    private $salary;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    private function checkAge($age){
        if($age>0 && $age<=100){
            return $this;
        }
        return false;
    }
}