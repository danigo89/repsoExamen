<?php
$contenido =file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=world");
$world =json_decode($contenido, true);

function getUnsortedCities($world){
    // Return an array of cities without any kind of sort.
    //NOTES 1: You receive a world multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.
    foreach ($world as $country){
        if(isset($country["Cities"])){
            foreach ($country["Cities"] as $city){
                $cities[]=$city;
            }
        }
    }
    return $cities;
}

function getSortedCitiesByPopulation($cities){
    // Return an array of cities sorted by it's population (ascending order).
    //NOTES 1: You receive a cities multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.
    for($i=0;$i < count($cities)-1;$i++){
        for($j = 0; $j <count($cities)-1;$j++){
            if($cities[$j]['Population'] > $cities[$j+1]['Population']){
               $aux= $cities[$j];
                $cities[$j]=$cities[$j+1];
                $cities[$j+1]=$aux;
            }
        }
    }
    return $cities;
}
?>
<html lang="es">
<head>
    <title>Cities of the world</title>
    <style>
        table, th, td {
            border: 1px solid black;
            padding-left: 5px;
            padding-right: 5px;
        }
        table {
            border-collapse: collapse;
        }
        thead {
            background-color: aquamarine;
        }
        tbody {
            background-color: aqua;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th colspan="6">Cities of the world (<?php
            //: Logic to print the number of cities.
            echo count(getUnsortedCities($world));
            ?>)</th>
    </tr>
    <tr>
        <th colspan="3">Unsorted cities</th>
        <th colspan="3">Sorted cities</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Population</th>
        <th>ID</th>
        <th>Name</th>
        <th>Population</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //: Logic to print the table body.
    $cities =getUnsortedCities($world);
    $sortcities = getSortedCitiesByPopulation($cities);
    for ($i=0;$i < count($cities);$i++){
        echo '<tr>';
        echo '<td>'.$cities[$i]["ID"].'</td>';
        echo '<td>'.$cities[$i]["Name"].'</td>';
        echo '<td>'.$cities[$i]["Population"].'</td>';
        echo '<td>'.$sortcities[$i]["ID"].'</td>';
        echo '<td>'.$sortcities[$i]["Name"].'</td>';
        echo '<td>'.$sortcities[$i]["Population"].'</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
</body>
</html>
