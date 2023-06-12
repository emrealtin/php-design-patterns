<?php

namespace builder;

use builder\parts\Vehicle;

class Director
{
    public function build(Builder $build) :Vehicle
    {
        $build->createVehicle();
        $build->addEngine();
        $build->addDoor();
        $build->addWhell();
        return $build->getVehicle();
    }
}