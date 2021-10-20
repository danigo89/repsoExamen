<?php
$contents_cities = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=cities");
$cities = json_decode($contents_cities, true);
$contents_countries = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=countries");
$countries = json_decode($contents_countries, true);

function mapCities()
{
    //TODO: Your code here
    global $cities;
    global $countries;
    foreach ($cities as $citykey =>$value) {
        foreach ($countries as  $countryKey => $countryValue) {
            if ($value["CountryCode"] == $countryValue['Code']) {
                $cities[$citykey]["CountryName"] = $countryValue["Name"];
            }
        }
    }
    return $cities;
}

function mapCountries()
{
    //TODO: Your code here
    global $countries;
    global $cities;
    foreach ($countries as $countrkey => $countryclave) {

        foreach ($cities as $city){
            if( $city["CountryCode"] == $countryclave['Code']){
                $countries[$countrkey]['Cities'][$city["ID"]] = $city["Name"];
            }

        }

    }
    return $countries;
}

//var_dump(mapCities()[0]);
var_dump(mapCountries());

//foreach (mapCities() as  $city) {
  //  echo var_dump($city) . '<br><br>';
//}