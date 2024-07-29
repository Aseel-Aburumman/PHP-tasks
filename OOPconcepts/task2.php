<?php

class Vehicle
{
    // properties must be defined with a visibility keyword
    private $type;


    function setType($type)
    {
        $this->type = $type;
    }


    function getType()
    {
        return $this->type;
    }

    function move()
    {
        echo " is not moving!";
    }
}

class Car extends Vehicle
{
    function move()
    {
        echo " is moving!";
    }
}



$car1 = new car();
$car1->setType("Tesla");
echo $car1->getType();
$car1->move();

echo "<BR>";


$car2 = new Vehicle();
$car2->setType("Ali's car");
echo $car2->getType();
$car2->move();
