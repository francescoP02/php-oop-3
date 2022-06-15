<?php

class User {

    public $name;
    public $email;
    public $credit_card_number;
    public $credit_card_expired;
    public $cart = [];
    public $registered = false;

    function __construct($_name, $_email, $_credit_card_number, $_credit_card_expired) {
        $this->name = $_name;
        $this->email = $_email;
        $this->credit_card_number = $_credit_card_number;
        $this->credit_card_expired = $_credit_card_expired;
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
    function canPurchase() {
        return !$this->credit_card_expired;
    }
}