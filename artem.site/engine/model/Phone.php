<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/model/Object.php";

class Phone extends Object implements JsonSerializable {
    private $name;
    private $image;
    private $priceArr;

    public function setName( $name ) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setImage( $image ) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }
    
    public function setPriceArr( $prices ) {
        $this->priceArr = [];

        foreach( $prices as $priceItem ) {
            if ($priceItem->getPhone()->getId() == $this->getId() ) {
                array_push( $this->priceArr, $priceItem );
            }
        }
    }

    public function getPriceArr() {
        return $this->priceArr;
    }

    public function getLastPrice() {

    }

    public function jsonSerialize() {
        return [
            "id"    => $this->getId(),
            "name"  => $this->getName(),
            "image" => $this->getImage(),
            "price" => $this->getPriceArr()
        ];
    }
}

?>