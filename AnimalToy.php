<?php
require_once __DIR__ . "/Product.php";

class AnimalToy extends Product {
    public $pet_type;

    function __construct($_brand, $_name, $_price, $_description, $_pet_type) {
        parent::__construct($_brand, $_name, $_price, $_description);
        $this->pet_type = $_pet_type;
    }

    public function printInfo() {
        return "Marca: $this->brand , $this->name. $this->description. Costo: € $this->price. Adatto per: $this->pet_type";
    }
}