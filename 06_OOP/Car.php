<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 10/18/2017
 * Time: 7:15 PM
 */

class Car
{
    const constant=1;
    /** @var string */
    protected $owner;
    /** @var  float */
    protected $price;
    protected $color;
    protected $isDrive = false;
    private $brand;

    public function &fun(){}
    public function __construct($owner, $price, $color, $brand)
    {
        $this->owner = $owner;
        $this->price = $price;
        $this->brand = $brand;
        $this->color = $color;
        echo "new car added" . PHP_EOL;
    }

    private function __clone()
    {
        return false;
    }

    public function __destruct()
    {
        echo "car deleted";
    }

    public function drive($state)
    {
        if ($state) {
            $this->isDrive = true;
        }
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand)
    {
        $this->brand = $brand;
    }

    public function showOwner()
    {
        $this->doblePrice();
        echo "Owner name: {$this->owner}, price: {$this->price}" . PHP_EOL;
        return;
    }

    private function doblePrice()
    {
        $this->price *= 2;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     */
    public function setOwner(string $owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return bool|void
     */

    public function setPrice(float $price)
    {
        if ($price < 1) {
            echo "wrong price" . PHP_EOL;
            return false;
        }
        $this->price = $price;
    }
}


