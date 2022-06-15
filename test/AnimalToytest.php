<?php
require_once __DIR__ . "/write.php";

class AnimalToy extends Product {
    public $pet_type;

    function __construct( $_name, $_brand, $_price, $_description, $_type, $_pet_type) {
        parent::__construct($_name, $_brand, $_price, $_description, $_type);
        $this->pet_type = $_pet_type;
    }

}