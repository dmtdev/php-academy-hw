<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.11.2017
 * Time: 11:00
 */

class Task3 extends Task2
{
    private function checkAge($age)
    {
        if ($age > 0 && $age <= 100) {
            return true;
        }
        return false;
    }

    public function setAge($age)
    {
        if ($this->checkAge($age)) {
            parent::setAge($age);
        }
    }
}