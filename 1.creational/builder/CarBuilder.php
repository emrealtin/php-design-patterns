<?php

namespace builder;

use builder\parts\Car;
use builder\parts\Door;
use builder\parts\Engine;
use builder\parts\Vehicle;
use builder\parts\Whell;

class CarBuilder implements Builder
{
    private Car $car;

    public function createVehicle()
    {
        $this->car = new Car();
    }

    public function addDoor()
    {
        $this->car->setParts('rightDoor', new Door());
        $this->car->setParts('leftDoor', new Door());
    }

    public function addEngine()
    {
        $this->car->setParts('engine', new Engine());
    }

    public function addWhell()
    {
        $this->car->setParts('LF', new Whell());
        $this->car->setParts('RF', new Whell());
        $this->car->setParts('LR', new Whell());
        $this->car->setParts('RR', new Whell());
    }

    public function getVehicle(): Vehicle
    {
       return $this->car;
    }

}