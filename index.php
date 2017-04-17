<?php
//php7.1.1

include('helperFunctions.php');
include("classes.php");
include("Inventory.php");

dropTable("Inventory");  //uncomment this to start from scratch
createInventoryTable();

insertReptile($reptile_inventory);
insertCat($cat_inventory);
insertDog($dog_inventory);
insertToy($toy_inventory);
insertCarrier($carrier_inventory);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<div class = "container-fluid">

    <div class="row"></div>
    <div class="row-fluid">
        <div class="col"></div>
        <form action="" method="request">


            <br>
            <select name="dropDown">
                <option value="p_id">List All</option>
                <option value="price">Price</option>
                <option value="age">Age</option>
                <option value="lifespan">Lifespan</option>
                <option value="breed">Breed</option>
                <option value="kind">Kind</option>
                <option value="material">Material</option>
                <option value="perishable">Perishable</option>
                <option value="animal_for">Animal For</option>
            </select>

            <select name="direction">
                <option value="">Select...</option>
                <option value="ASC">Ascending</option>
                <option value="DESC">Decending</option>
            </select>

            <input class="btn btn-primary" type="submit" name="orderSubmit" value="Submit">
        </form>
    </div>
</div>

</div>

<div class = "container-fluid">

    <?php

    if (isset($_REQUEST['dropDown']))
    {

        $order = $_REQUEST['dropDown'];
        $direction = $_REQUEST['direction'];

        $sorted = array('p_id'=>'ID (all)',
                        'price'=>'Price',
                        'age'=>'Age',
                        'lifespan'=>'Lifespan',
                        'breed'=>'Breed',
                        'kind'=>'Kind',
                        'material'=>'Material',
                        'perishable'=>'Perishable',
                        'animal_for'=>'Animal For'

                );

        echo "<H2> Sorted By " . $sorted[$order] . "</H2>";
        orderBy($order,$direction);


    }
    else
    {
        orderBy('p_id','ASC');
    }
    ?>

</div>

</body>
</html>
