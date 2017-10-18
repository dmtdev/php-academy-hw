<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 10/18/2017
 * Time: 8:20 PM
 */

class Truck extends Car
{
    private $weight;
    private $brand;

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }


    public function __construct($owner, $price, $color, $brand, $weight)
    {
        parent::__construct($owner, $price, $color, $brand);
        $this->weight = $weight;
        $this->brand = 'Truck: ' . $brand;
    }


}