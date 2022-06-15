<?php
require_once __DIR__ . "/write.php";

class AnimalFood extends Product {
    public $weight;
    public $animal_year;

    function __construct($_name, $_brand, $_price, $_description, $_type, $_weight, $_animal_year) {
        parent::__construct($_name, $_brand, $_price, $_description, $_type);
        $this->weight = $_weight;
        $this->animal_year = $_animal_year;
    }
}