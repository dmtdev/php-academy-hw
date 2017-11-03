<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.11.2017
 * Time: 15:19
 */

class Driver extends Worker
{
    private $experience;
    private $categories;

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
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