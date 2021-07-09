<?php 

include_once $_SERVER['DOCUMENT_ROOT'] . "/engine/DAO.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/engine/dao/Phone.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/engine/model/PhonePrice.php";

class PhonePriceDAO extends DAO {
    public function __construct( $connection ) {
        parent::__construct( $connection, "phoneprice" );
    }

    public function add( $phone ) {  
        $query_string = "INSERT INTO " . $this->getTable();
        $query_string .= " (`phone_id`, `price`, `timestamp`) VALUES ";
        $query_string .= "('{$phone->getPhone()->getId()}', '{$phone->getPrice()}', '{$phone->getTimestamp()}');";

        $this->getConnection()->query( $query_string );
    }

    public function getAll() {
        $values = parent::getAll();
        $phoneDao = new PhoneDAO( $this->getConnection() );

        foreach ( $values as $phoneprice ) {
            $phoneprice->setPhone( $phoneDao->getById($phoneprice->getDAOPhoneId()) );
        }

        return $values;
    }

    public function update( $phone ) {
        $this->getConnection()->update( 
            parent::getTable(),
            $user->getId(),
            [
                [
                    "phone_id",
                    $user->getPhone()->getId()
                ],
                [
                    "price",
                    $user->getPrice()
                ],
                [
                    "timestamp",
                    $user->getTimestamp()
                ]
            ]
        );
    }
}

?>