<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/interface/IDAO.php";

/* Реализация базовогор класса недо-DAO */
class DAO implements IDAO {
    private $table; // имя таблицы в БД
    private $connection; // подключеник к БД

    function __construct( $connection, $table ) {
        $this->connection = $connection;
        $this->table = $table;
    }

    public function getTable() {
        return $this->table;
    }

    public function getConnection() {
        return $this->connection;
    }

    // // // // //
    /* Выполняет запрос SELECT * FROM $table и обрабатывает его*/
    public function getAll() {
        $query_result = $this->connection->query( "SELECT * FROM $this->table" );
        return ( gettype($query_result) != "boolean" )?( $this->connection->fetchQuery($query_result, $this->table) ):( [] );
    }

    /* Выполняет запрос SELECT * FROM $table WHERE $id = искомому id и обрабатывает его */
    public function getById( $id ) {
        $query_result = $this->connection->query( "SELECT * FROM $this->table WHERE id = $id" );
        return ( gettype($query_result) != "boolean" )?( $this->connection->fetchQuery($query_result, $this->table)[0] ):( [] );
    }

    /* Выполняет выборку по переданным полям $fields и обрабатывает ответ */
    public function getByFields( $fields ) {
        $query_string = "SELECT * FROM " . $this->getTable() . " WHERE ";

        foreach( $fields as $row ) {
            $query_string .= $row[0] . "='" . $row[1] . "'" . ( (end($fields) === $row) ? ("") : (",") );
        }

        $query_result = $this->connection->query( $query_string );
        return ( gettype($query_result) != "boolean" )?( $this->connection->fetchQuery($query_result, $this->table) ):( [] );
    }

    /* Этот метод реализуется в наследуемых классах \ добавляет сущность в БД */
    public function add( $object ) {
        throw new Exception( "Not implemented" );
    }

    /* Этот метод реализуется в наследуемых классах \ обновляет сущность в БД */
    public function update( $object ) {
        throw new Exception( "Not implemented" );
    }

    /* Производит удаления по id в $table */
    public function deleteById( $id ) {
        $this->connection->query( "DELETE FROM $this->table WHERE id = $id" );
    }
}

?>