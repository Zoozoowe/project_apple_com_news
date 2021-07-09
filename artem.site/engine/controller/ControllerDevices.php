<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/Controller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/dao/Phone.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/dao/PhonePrice.php";

class ControllerDevices extends Controller {
    public function GET( $parsedURI ) {
        $phoneDao       = new PhoneDao( $this->getConnection() );
        $phonePriceDao  = new PhonePriceDao( $this->getConnection() );

        $phonesArr  = $phoneDao->getAll();
        $priceArr   = $phonePriceDao->getAll();

        $returnArr = [];

        foreach ( $phonesArr as $phone ) {
            $phone->setPriceArr( $priceArr );
            array_push( $returnArr, $phone );
        }

        header('Content-Type: application/json');
        echo( json_encode($returnArr) );

    }
}

?>