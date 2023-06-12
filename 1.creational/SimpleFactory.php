<?php

/**
 * Simple factory
 */
class Factory
{
    public function createCar(): Car
    {
        return new Car();
    }

    public function createMotorcycle(): Motorcycle
    {
        return new Motorcycle();
    }

}

class Car {}
class Motorcycle{}

$car = (new Factory())->createCar();
$motorcycle = (new Factory())->createMotorcycle();