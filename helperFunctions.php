<?php



//dropTable('Inventory');
//createInventoryTable();

//insertReptile($reptile_inventory);
//insertCat($cat_inventory);
//insertDog($dog_inventory);
//insertToy($toy_inventory);
//insertCarrier($carrier_inventory);
//listAll();
//orderBy($order,$direction);
//orderByCLI($order); for running in command line as opposed to orderBy($order) which is for web

function dropTable($table)
{
    $db = new PDO('sqlite:testDB.sqlite3');
    $db->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);

    $stmt = "DROP TABLE " . $table;
    $worked = $db->exec($stmt);

    //echo $worked;
}



function createInventoryTable()
{
    $db = new PDO('sqlite:testDB.sqlite3');
    $db->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);

    $worked = $db->exec("CREATE TABLE IF NOT EXISTS Inventory (
                    p_id INTEGER PRIMARY KEY AUTOINCREMENT,
                    price REAL NOT NULL,
                    age INTEGER,
                    lifespan INTEGER,
                    breed TEXT,
                    color TEXT,
                    kind TEXT,

                    perishable TEXT,
                    animal_for TEXT,
                    material TEXT
                    );");
    //echo $worked;

}

function insertReptile($array)
{
    $db = new PDO('sqlite:testDB.sqlite3');

    $insert = "INSERT INTO Inventory(price,age,lifespan,breed,color,kind) 
            VALUES(:price,:age,:lifespan,:breed,:color,:kind)";

    $stmt = $db->prepare($insert);


// Bind parameters to statement variables
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':lifespan', $lifespan);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':breed', $breed);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':kind', $kind);

    foreach ($array as $row) {

        $r = new Reptile(...$row);

        $price = $r->price;
        $lifespan = $r->lifespan;
        $age = $r->age;
        $breed = $r->breed;
        $color = $r->color;
        $kind = get_class($r);

        // Execute statement
        $stmt->execute();

    }

};

function insertCat($array)
{
    $db = new PDO('sqlite:testDB.sqlite3');

    $insert = "INSERT INTO Inventory(price,age,lifespan,breed,color,kind) 
            VALUES(:price,:age,:lifespan,:breed,:color,:kind)";

    $stmt = $db->prepare($insert);

// Bind parameters to statement variables
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':lifespan', $lifespan);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':breed', $breed);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':kind', $kind);

    foreach ($array as $row) {

        $r = new Cat(...$row);

        $price = $r->price;
        $lifespan = $r->lifespan;
        $age = $r->age;
        $breed = $r->breed;
        $color = $r->color;
        $kind = get_class($r);

        // Execute statement
        $stmt->execute();

    }

};

function insertDog($array)
{
    $db = new PDO('sqlite:testDB.sqlite3');

    $insert = "INSERT INTO Inventory(price,age,lifespan,breed,color,kind) 
            VALUES(:price,:age,:lifespan,:breed,:color,:kind)";

    $stmt = $db->prepare($insert);

// Bind parameters to statement variables
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':lifespan', $lifespan);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':breed', $breed);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':kind', $kind);

    foreach ($array as $row) {

        $r = new Dog(...$row);

        $price = $r->price;
        $lifespan = $r->lifespan;
        $age = $r->age;
        $breed = $r->breed;
        $color = $r->color;
        $kind = get_class($r);

        // Execute statement
        $stmt->execute();

    }

};

function insertToy($array)
{
    $db = new PDO('sqlite:testDB.sqlite3');

    $insert = "INSERT INTO Inventory(price,color,kind,perishable,animal_for) 
            VALUES(:price,:color,:kind,:perishable,:animal_for)";

    $stmt = $db->prepare($insert);

// Bind parameters to statement variables
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':kind', $kind);

    $stmt->bindParam(':perishable', $perishable);
    $stmt->bindParam(':animal_for', $animal_for);


    foreach ($array as $row) {

        $r = new Toy(...$row);
        $price = $r->price;
        $color = $r->color;
        $kind = get_class($r);
        $perishable = $r->perishable;
        $animal_for = $r->animal_for;

        // Execute statement
        $stmt->execute();


    }

};

function insertCarrier($array)
{
    $db = new PDO('sqlite:testDB.sqlite3');

    $insert = "INSERT INTO Inventory(price,color,kind,material,animal_for) 
            VALUES(:price,:color,:kind,:material,:animal_for)";

    $stmt = $db->prepare($insert);

// Bind parameters to statement variables
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':kind', $kind);
    $stmt->bindParam(':material',$material);
    $stmt->bindParam(':animal_for', $animal_for);


    foreach ($array as $row) {

        $r = new Carrier(...$row);
        $price = $r->price;
        $color = $r->color;
        $kind = get_class($r);
        $material = $r->material;
        $animal_for = $r->animal_for;

        // Execute statement
        $stmt->execute();


    }

};


function listAllCLI()
{
    $db = new PDO('sqlite:testDB.sqlite3');
    $result = $db->query('SELECT * FROM Inventory');


    foreach($result as $row) {
        echo "Id: " . $row['p_id'] . "\n";
        echo "Price: " . $row['price'] . "\n";

        if ($row['age'] !== null)
        {
            echo "Age: " . $row['age'] . "\n";
        }

        if ($row['lifespan'] !== null)
        {
            echo "Lifespan: " . $row['lifespan'] . "\n";
        };

        if ($row['breed'] !== null)
        {
            echo "Breed: " . $row['breed'] . "\n";
        }

        echo "Kind: " . $row['kind'] . "\n";

        if ($row['perishable'] !== null)
        {
            echo "Perishable: " . $row['perishable'] . "\n";
        }

        if ($row['material'] !== null)
        {
            echo "Material: " . $row['material'] . "\n";
        }

        if ($row['animal_for'] !== null)
        {
            echo "Animal For: " . $row['animal_for'] . "\n";
        };

        echo "\n";
    }

    return $result;


}

function orderBy($order,$direction)
{
    $db = new PDO('sqlite:testDB.sqlite3');

    $stmt = "SELECT * FROM Inventory WHERE ". $order . " IS NOT NULL ORDER BY " . $order . " " .$direction;


    $result = $db->query($stmt);


    echo "<table class='table'>";
    switch ($order)
    {

        case 'p_id':
        case 'price':
        case 'kind':
            echo "<tr><th>ID</th><th>Price</th><th>Age</th><th>Lifespan</th><th>Breed</th><th>Kind</th><th>Material</th><th>Perishable</th><th>Animal For</th></tr>";

            foreach($result as $row)
            {
                echo "<tr>";
                echo "<td>" . $row['p_id'] . "</td>";
                echo "<td>$" . $row['price'] . "</td>";
                //echo money_format("<td>$%i</td>", $row['price']);
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['lifespan'] . "</td>";
                echo "<td>" . $row['breed'] . "</td>";
                echo "<td>" . $row['kind'] . "</td>";
                echo "<td>" . $row['material'] . "</td>";
                echo "<td>" . $row['perishable'] . "</td>";
                echo "<td>" . $row['animal_for'] . "</td>";


                echo "</tr>";

            }

            break;

        case 'age':
        case 'lifespan':
        case 'breed':
            echo "<tr><th>ID</th><th>Price</th><th>Age</th><th>Lifespan</th><th>Breed</th><th>Kind</th></tr>";

            foreach($result as $row)
            {
                echo "<tr>";
                echo "<td>" . $row['p_id'] . "</td>";
                echo money_format("<td>$%i</td>", $row['price']);
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['lifespan'] . "</td>";
                echo "<td>" . $row['breed'] . "</td>";
                echo "<td>" . $row['kind'] . "</td>";

                echo "</tr>";

            }

            break;

        case 'perishable':
            echo "<tr><th>ID</th><th>Price</th><th>Kind</th><th>Perishable</th><th>Animal For</th></tr>";

            foreach($result as $row)
            {
                echo "<tr>";
                echo "<td>" . $row['p_id'] . "</td>";
                echo money_format("<td>$%i</td>", $row['price']);
                echo "<td>" . $row['kind'] . "</td>";
                echo "<td>" . $row['perishable'] . "</td>";
                echo "<td>" . $row['animal_for'] . "</td>";

                echo "</tr>";

            }

            break;

        case 'animal_for':
            echo "<tr><th>ID</th><th>Price</th><th>Kind</th><th>Material</th><th>Perishable</th><th>Animal For</th></tr>";

            foreach($result as $row)
            {
                echo "<tr>";
                echo "<td>" . $row['p_id'] . "</td>";
                echo money_format("<td>$%i</td>", $row['price']);
                echo "<td>" . $row['kind'] . "</td>";
                echo "<td>" . $row['material'] . "</td>";
                echo "<td>" . $row['perishable'] . "</td>";
                echo "<td>" . $row['animal_for'] . "</td>";
                echo "</tr>";

            }

            break;

        case 'material':
            echo "<tr><th>ID</th><th>Price</th><th>Kind</th><th>Material</th><th>Animal For</th></tr>";

            foreach($result as $row)
            {
                echo "<tr>";
                echo "<td>" . $row['p_id'] . "</td>";
                echo money_format("<td>$%i</td>", $row['price']);
                echo "<td>" . $row['kind'] . "</td>";
                echo "<td>" . $row['material'] . "</td>";
                echo "<td>" . $row['animal_for'] . "</td>";
                echo "</tr>";

            }

            break;



    }

    echo "</table>";

    return $result;


};

function orderByCLI($order)
{
    $db = new PDO('sqlite:testDB.sqlite3');
    //$stmt = $db->prepare('SELECT * FROM Inventory ORDER BY PRICE');

    //$stmt->bindParam(':order',$order);
    //$result = $stmt->execute();
    //$order = 'PRICE';
    $stmt = "SELECT * FROM Inventory WHERE ". $order . " IS NOT NULL ORDER BY " . $order;
    echo $stmt;
    //$stmt= $db->prepare("SELECT * FROM Inventory ORDER BY :order");
    //$stmt->bindParam(':order',$order,PDO::PARAM_STR);
    //$result = $stmt->execute();

    $result = $db->query($stmt);




    foreach($result as $row) {
        echo "Id: " . $row['p_id'] . "\n";
        echo "Price: " . $row['price'] . "\n";

        if ($row['age'] !== null)
        {
            echo "Age: " . $row['age'] . "\n";
        }

        if ($row['lifespan'] !== null)
        {
            echo "Lifespan: " . $row['lifespan'] . "\n";
        };

        if ($row['breed'] !== null)
        {
            echo "Breed: " . $row['breed'] . "\n";
        }

        echo "Kind: " . $row['kind'] . "\n";

        if ($row['perishable'] !== null)
        {
            echo "Perishable: " . $row['perishable'] . "\n";
        }

        if ($row['animal_for'] !== null)
        {
            echo "Animal For: " . $row['animal_for'] . "\n";
        };

        echo "\n";
    }

    return $result;


};


?>