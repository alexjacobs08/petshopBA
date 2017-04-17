<?php


include("classes.php");
include("helperFunctions.php");

$Inventory = array();

// DID NOT WRITE THIS
///////////////////////////////////////////////////////////////////////////
echo '4';
function print_vars($obj)
{
    foreach (get_object_vars($obj) as $prop => $val) {
        echo "\t$prop = $val\n";
    }
}

function print_methods($obj)
{
    $arr = get_class_methods(get_class($obj));
    foreach ($arr as $method) {
        echo "\tfunction $method()\n";
    }
}

function class_parentage($obj, $class)
{
    if (is_subclass_of($GLOBALS[$obj], $class)) {
        echo "Object $obj belongs to class " . get_class($GLOBALS[$obj]);
        echo ", a subclass of $class\n";
    } else {
        echo "Object $obj does not belong to a subclass of $class\n";
    }
}
///////////////////////////////////////////////////////////////////////////
// END OF DID NOT WRITE //


$Spot = new Dog(12,8,45,"Golden","Yellow"); // ($lifespan, $age, $price, $breed, $color)

echo "Spot: CLASS " . get_class($Spot) . "\n";
echo ", PARENT " . get_parent_class($Spot) . "\n";

echo "\nSpot: Methods\n";
print_methods($Spot);

echo "\nParentage:\n";
class_parentage("Spot", "Dog");
class_parentage("Spot", "Pet");


echo "Spot: Price " . $Spot->get_price() . "\n";
echo "Spot: Age " . $Spot->get_age() . "\n";
echo "Spot: Lifespan " . $Spot->get_lifespan() . "\n";
echo "Spot: Breed " . $Spot->get_breed() . "\n";
echo "Spot: Color " . $Spot->get_color() . "\n";
echo "Spot: Type " . $Spot->get_type() . "\n";

echo "\n";

$Rock = new Toy("gray","lizard", 'No', 12);

echo "Rock: CLASS " . get_class($Rock) . "\n";
echo ", PARENT " . get_parent_class($Rock) . "\n";

echo "\nRock: Methods\n";
print_methods($Rock);

echo "\nParentage:\n";
class_parentage("Rock", "Item");
class_parentage("Rock", "Toy");

echo "Rock: Price " . $Rock->get_price() . "\n";
echo "Rock: Color " . $Rock->get_color() . "\n";
echo "Rock: For " . $Rock->get_animal_for() . "\n";
echo "Rock: Type " . $Rock->get_type() . "\n";

if ($Rock->get_type() == "Toy")
    echo "Rock: is Perishable? " . $Rock->get_perishable() . "\n";
elseif ($Rock -> get_type() == "Carrier")
    echo "Rock: Material " . $Rock->get_material() . "\n";

$Toad = new Reptile(2,0,15,"Frog","Green"); // ($lifespan, $age, $price, $breed, $color)

print_r($Toad);

echo $Toad->get_type();


?>

