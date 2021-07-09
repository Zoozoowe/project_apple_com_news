<?php 

include_once $_SERVER['DOCUMENT_ROOT'] . "/engine/interface/IObject.php";

/* Базовая модель объекта в БД */
class Object implements IObject, JsonSerializable {
    protected $id;

    public function getId() {
        return $this->id;
    }

    
    public function jsonSerialize() {
        return [
            "id" => $this->getId()
        ];
    }
}

?>