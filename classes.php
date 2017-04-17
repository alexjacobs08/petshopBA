<?php


abstract class Item {

    var $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function get_price()
    {
        return $this->price;
    }

}
abstract class Pet extends Item
{
    var $lifespan;
    var $age;


    public function __construct($lifespan, $age, $price)
    {

        $this->lifespan = $lifespan;
        $this->age = $age;

        if ($age > ($lifespan/2))
            $price = ($price / 2);
        parent:: __construct($price);

    }

    public function get_price()
    {
        return parent::get_price();
    }

    public function get_lifespan()
    {
        return $this->lifespan;
    }

    public function get_age()
    {
        return $this->age;
    }





}// end of class Pet


class Dog extends Pet {

    var $breed;
    var $color;


    public function __construct($lifespan, $age, $price, $breed, $color)
    {
        parent::__construct($lifespan, $age, $price);

        $this->breed = $breed;
        $this->color = $color;


    }

    public function get_lifespan()
    {
        return parent::get_lifespan();
    }

    function get_breed()
    {
        return $this->breed;
    }

    function get_color()
    {
        return $this->color;
    }

    public function get_type()
    {
        return get_class();
    }



} // end of class Dog

class Cat extends Pet {

    var $breed;
    var $color;


    public function __construct($lifespan, $age, $price, $breed, $color)
    {
        parent::__construct($lifespan, $age, $price);

        $this->breed = $breed;
        $this->color = $color;

    }

    public function get_lifespan()
    {
        return parent::get_lifespan();
    }

    function get_breed()
    {
        return $this->breed;
    }

    function get_color()
    {
        return $this->color;
    }

    public function get_type()
    {
        return get_class();
    }



} // end of class Cats

class Reptile extends Pet {

    var $breed;
    var $color;


    public function __construct($lifespan, $age, $price, $breed, $color)
    {
        parent::__construct($lifespan, $age, $price);

        $this->breed = $breed;
        $this->color = $color;


    }

    public function get_lifespan()
    {
        return parent::get_lifespan();
    }

    function get_breed()
    {
        return $this->breed;
    }

    function get_color()
    {
        return $this->color;
    }

    public function get_type()
    {
        return get_class();
    }




} // end of class Dog

class Toy extends Item
{

    var $color;
    var $animal_for;
    var $perishable;


    public function __construct($color,$animal_for, $perishable, $price)
    {
        parent:: __construct($price);

        $this->color = $color;
        $this->animal_for = $animal_for;
        $this->perishable = $perishable;


    }


    public function get_price()
    {
        return parent::get_price();
    }


    public function get_color()
    {
        return $this->color;
    }

    public function get_animal_for()
    {
        return $this->animal_for;
    }

    public function get_perishable()
    {
        return $this->perishable;
    }

    public function get_type()
    {
        return get_class();
    }


}

class Carrier extends Item
{

    var $color;
    var $animal_for;
    var $material;

    public function __construct($color,$animal_for, $material, $price)
    {
        parent:: __construct($price);
        $this->color = $color;
        $this->animal_for = $animal_for;
        $this->material = $material;

    }

    public function get_price()
    {
        return parent::get_price();
    }

    public function get_color()
    {
        return $this->color;
    }

    public function get_animal_for()
    {
        return $this->animal_for;
    }

    public function get_material()
    {
        return $this->material;
    }

    public function get_type()
    {
        return get_class();
    }


}


?>