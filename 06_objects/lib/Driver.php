<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.11.2017
 * Time: 15:19
 */

class Driver extends Worker
{
    private $expirience;
    private $categories;

    /**
     * @return mixed
     */
    public function getExpirience()
    {
        return $this->expirience;
    }

    /**
     * @param mixed $expirience
     */
    public function setExpirience($expirience)
    {
        $this->expirience = $expirience;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }



}