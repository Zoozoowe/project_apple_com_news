<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/model/Object.php";

class User extends Object implements JsonSerializable {
    private $email;
    private $passwordhash;

    public function setEmail( $email ) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPassHash( $newHash ) {
        $this->passwordhash = $newHash;
    }

    public function getPassHash() {
        return $this->passwordhash;
    }    


    public function jsonSerialize() {
        return [
            "id"    => $this->getId(),
            "email" => $this->getEmail()
        ];
    }
}

?>