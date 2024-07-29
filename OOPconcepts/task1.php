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

echo "<BR>";
$car2 = new car();
$car2->setMake("Amirecan");
echo $car2->getMake();
$car2->setModel("Tesla");
echo $car2->getModel();
$car2->setYear("2020");
echo $car2->getYear();
echo "<BR>";

$car3 = new car();
$car3->setMake("German");
echo $car3->getMake();
$car3->setModel("BMW");
echo $car3->getModel();
$car3->setYear("2023");
echo $car3->getYear();
echo "<BR>";
