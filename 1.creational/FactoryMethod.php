<?php

interface vehicleInterface
{
    public function run();
    public function stop();
}
class Car implements vehicleInterface {
    public function run()
    {
        echo "Run Car";
    }

    public function stop()
    {
        echo "Stop Car";
    }
}
class Motorcycle implements vehicleInterface {
    public function run()
    {
        echo "Run Motorcycle";
    }

    public function stop()
    {
        echo "Stop Motorcycle";
    }
}


/**
 * Factory method
 * Üretim kısımları ile kullanım kısımlarını ayırmak hedeflenir
 * Kullanım sırasındaki kod tekrarını azaltmak ve her sınıfın kendi sorumlulukları altında çalışmasını sağlamak.
 */

abstract class vehicleFactory{
    public function createVehicle(){}

    public function create()
    {
        return $this->createVehicle();
    }
}

class CarFactory extends vehicleFactory{
    public function createVehicle(): Car
    {
        return new Car();
    }

}

class MotorcycleFactory extends vehicleFactory {
    public function createVehicle(): Motorcycle
    {
        return new Motorcycle();
    }
}


$vehicle = (new CarFactory())->create();
$vehicle->run();
