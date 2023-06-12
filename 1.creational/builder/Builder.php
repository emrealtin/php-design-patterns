<?php

namespace builder;

use builder\parts\Vehicle;

interface Builder
{
    public function createVehicle();

    public function addEngine();
    public function addDoor();
    public function addWhell();
    public function getVehicle() :Vehicle;
}