<?php
require_once __DIR__ . "/Product.php";

class AnimalFood extends Product {
    public $weight;
    public $animal_year;

    function __construct($_brand, $_name, $_price, $_description, $_weight, $_animal_year) {
        parent::__construct($_brand, $_name, $_price, $_description);
        $this->weight = $_weight;
        $this->animal_year = $_animal_year;
    }

    public function printInfo() {
        return "Marca: $this->brand , $this->name. $this->description. Costo: € $this->price. Quantità: $this->weight g . Adatto per animali fino a: $this->animal_year";
    }
}