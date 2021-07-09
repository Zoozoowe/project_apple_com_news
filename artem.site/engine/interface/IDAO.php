<?php 

/* Интерфейса для DAO классов */
interface IDAO {
    public function getTable();
    public function getConnection();

    public function getAll();
    public function getById( $id );
    
    public function add( $object );
    public function update( $object );
    public function deleteById( $id );
}

?>