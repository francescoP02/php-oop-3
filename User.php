<?php

require_once __DIR__ ."/CreditCard.php";

class User {

    use CreditCard;

    public $name;
    public $email;
    public $card_number;
    public $expiration;
    public $cvc;
    public $cart = [];
    public $registered = false;

    function __construct($_name, $_email, $_card_number, $_expiration, $_cvc) {
        $this->name = $_name;
        $this->email = $_email;
        $this->card_number = $_card_number;
        $this->expiration = $_expiration;
        $this->cvc = $_cvc;
    }

    function addProductToCart($_product) {
        if ($_product->in_stock) {
            $this->cart[] = $_product;
            return true;
        } else {
            return false;
        }
    }

    function register() {
        $this->registered = true;
        return "Complimenti ".$this->name."! Hai effettuato la registrazione.";
    }

    function getTotalPrice() {
        $total_price = 0;
        foreach($this->cart as $item) {
            $total_price += $item->price;
        }
        
        if ($this->registered) {
            return $total_price*0.80." (sconto del 20% applicato)";
        }
        else {
        return $total_price;
        }
    }
}