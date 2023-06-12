<?php

interface CampaignsInterface
{
    public function calculatePrice(): float;

    public function getDescription(): string;
}


class Sales implements CampaignsInterface
{
    public function calculatePrice(): float
    {
        return 150.00;
    }

    public function getDescription(): string
    {
        return 'standart discount ';
    }
}

abstract class SalesDecorator implements CampaignsInterface
{
    protected $sales;

    public function __construct(CampaignsInterface $sales)
    {
        $this->sales = $sales;
    }
}

class BlackFridayDecorator extends SalesDecorator
{
    public function calculatePrice(): float
    {
        return $this->sales->calculatePrice() -50;
    }

    public function getDescription(): string
    {
        return $this->sales->getDescription() . 'black friday discount ';
    }
}

class StaffDecorator extends SalesDecorator
{
    public function calculatePrice(): float
    {
        return $this->sales->calculatePrice() - 20;
    }

    public function getDescription(): string
    {
        return $this->sales->getDescription() . ' with staff campaign ';
    }
}

$sales = new Sales();
echo $sales->getDescription().PHP_EOL;
echo $sales->calculatePrice().PHP_EOL;

$sales = new Sales();
$sales = new BlackFridayDecorator($sales);
echo $sales->getDescription().PHP_EOL;
echo $sales->calculatePrice().PHP_EOL;

$sales = new Sales();
$sales = new StaffDecorator($sales);
echo $sales->getDescription().PHP_EOL;
echo $sales->calculatePrice().PHP_EOL;