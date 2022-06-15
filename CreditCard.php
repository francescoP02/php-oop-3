<?php 
trait CreditCard {
    public $card_number;
    public $expiration;
    public $cvc;

    function __construct($_card_number, $_expiration, $_cvc) {
        $this->card_number = $_card_number;
        $this->expiration = $_expiration;
        $this->cvc = $_cvc;
    }

    public function isValid() {
        $today = new \DateTime('midnight');
        $expiration_datetime = \DateTime::createFromFormat("m/y", $this->expiration);
        return $today < $expiration_datetime;
    }
}