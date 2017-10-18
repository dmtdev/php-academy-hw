<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 10/18/2017
 * Time: 7:03 PM
 */
include_once 'Car.php';
include_once 'Truck.php';
echo '<pre>';


$car = new Car("ivan",1000,"Model","Black");
var_dump($car);
//$car = 0;

$truck = new Truck("Jon",50000,"Mersedes","Red",30000);
var_dump($truck);