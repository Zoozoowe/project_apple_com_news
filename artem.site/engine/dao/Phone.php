<?php 

include_once $_SERVER['DOCUMENT_ROOT'] . "/engine/DAO.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/engine/model/Phone.php";

class PhoneDAO extends DAO {
    public function __construct( $connection ) {
        parent::__construct( $connection, "phone" );
    }

    public function add( $phone ) {  
        $query_string = "INSERT INTO " . $this->getTable();
        $query_string .= " (`name`, `image`, `description`) VALUES ";
        $query_string .= "('{$phone->getName()}', '{$phone->getImage()}', '{$phone->getDescription()}');";

        $this->getConnection()->query( $query_string );
    }

    public function update( $phone ) {
        $this->getConnection()->update( 
            parent::getTable(),
            $user->getId(),
            [
                [
                    "name",
                    $user->getName()
                ],
                [
                    "description",
                    $user->getDescription()
                ],
                [
                    "image",
                    $user->getImage()
                ]
            ]
        );
    }
}

?>