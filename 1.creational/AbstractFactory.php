<?php

/**
 * Methods
 */
interface Car{
    public function run();
}
class AmericanCar implements Car
{
    public function run()
    {
        // TODO: Implement run() method.
    }
}

class EuropeanCar implements Car
{
    public function run()
    {
        // TODO: Implement run() method.
    }
}

/**
 * Factory
 */

interface Factory{
    public function create();
}

class AmericanMarket implements Factory{
    public function create()
    {
        return new AmericanCar();
    }
}

class EuropeanMarket implements Factory{
    public function create()
    {
        return new EuropeanCar();
    }
}

$factory = (new AmericanMarket())->create();
$factory->run();