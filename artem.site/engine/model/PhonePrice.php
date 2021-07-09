<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/model/Object.php";

class PhonePrice extends Object implements JsonSerializable {
    private $phone;
    private $phone_id;
    private $price;
    private $timestamp;

    public function setPhone( $phone ) {
        $this->phone = $phone;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getDAOPhoneId() {
        return $this->phone_id;
    }

    public function setPrice( $price ) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setTimestamp( $timestamp ) {
        $this->timestamp = $timestamp;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }    

    public function jsonSerialize() {
        return [
            "id"            => $this->getId(),
            "phone_id"      => $this->getPhone()->getId(),
            "price"         => $this->getPrice(),
            "timestamp"     => $this->getTimestamp()
        ];
    }
}

?>