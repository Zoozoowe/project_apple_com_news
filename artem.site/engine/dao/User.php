<?php 

include_once $_SERVER['DOCUMENT_ROOT'] . "/engine/DAO.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/engine/model/User.php";

class UserDAO extends DAO {
    public function __construct( $connection ) {
        parent::__construct( $connection, "user" );
    }

    public function add( $user ) {  
        $query_string = "INSERT INTO " . $this->getTable();
        $query_string .= " (`email`, `passwordHash`) VALUES ";
        $query_string .= "('{$user->getEmail()}', '{$user->getPassHash()}');";

        $this->getConnection()->query( $query_string );
        $user = $this->getByEmail($user->getEmail())[0];

        $_SESSION["userid"] = $user->getId();
    }

    public function getByEmail( $email ) {
        return parent::getByFields( [
            [
                "email",
                $email
            ]
        ] );
    }

    public function update( $user ) {
        $this->getConnection()->update( 
            parent::getTable(),
            $user->getId(),
            [
                [
                    "email",
                    $user->getEmail()
                ],
                [
                    "passwordhash",
                    $user->getPasswordHash()
                ]
            ]
        );
    }
}

?>