<?php

class Car
{
    // properties must be defined with a visibility keyword
    private $make;
    private $model;
    private  $year;

    function setMake($make)
    {
        $this->make = $make;
    }

    function setModel($model)
    {
        $this->model = $model;
    }

    function setYear($year)
    {
        $this->year = $year;
    }

    function getMake()
    {
        return $this->make;
    }

    function getModel()
    {
        return $this->model;
    }

    function getYear()
    {
        return $this->year;
    }
}

$car1 = new car();
$car1->setMake("Japanese");
echo $car1->getMake();
$car1->setModel("Honday");
echo $car1->getModel();
$car1->setYear("2010");
echo $car1->getYear();



echo $car1->make;
// echo $car1->model;
// echo $car1->year;