<?php

$filename = 'data.json';

header('Content-Type: application/json');

$json = file_get_contents($filename);

$arrayProducts = json_decode($json, true);

$name = $_POST['name'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$description = $_POST['description'];

class Movie {
    public $name;
    public $brand;
    public $price;
    public $description;

    function __construct($_name, $_brand, $_price, $_description) {
        $this->name = $_name;
        $this->brand = $_brand;
        $this->price = $_price;
        $this->description = $_description;
    }

}

$arrayProducts[] = new Movie($name, $brand, $price, $description);

$json = json_encode($arrayProducts, JSON_PRETTY_PRINT);

file_put_contents($filename, $json);

echo $json;