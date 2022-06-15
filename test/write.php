<?php

$filename = 'data.json';

header('Content-Type: application/json');

$json = file_get_contents($filename);

$arrayProducts = json_decode($json, true);

require_once __DIR__ . "/AnimalToytest.php";
require_once __DIR__ . "/AnimalFoodtest.php";

$name = $_POST['name'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$description = $_POST['description'];
$type = $_POST['type'];
$pet_type = $_POST['pet_type'];
$weight = $_POST['weight'];
$animal_year = $_POST['animal_year'];

class Product {
    public $name;
    public $brand;
    public $price;
    public $description;
    public $type;

    function __construct($_name, $_brand, $_price, $_description, $_type) {
        $this->name = $_name;
        $this->brand = $_brand;
        $this->price = $_price;
        $this->description = $_description;
        $this->type = $_type;
    }

}

// $arrayProducts[] = new Product($name, $brand, $price, $description);


switch ($type) {
    case 'toy':
        $arrayProducts[] = new AnimalToy($name, $brand, $price, $description, $type, $pet_type);
        break;

    case 'food':
        $arrayProducts[] = new AnimalFood($name, $brand, $price, $description, $type, $weight, $animal_year);
        break;
}



var_dump($arrayProducts);

$json = json_encode($arrayProducts, JSON_PRETTY_PRINT);

file_put_contents($filename, $json);

echo $json;