<?php 

include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";

/* Класс для работы с БД */
class Connection {
    private $link;

    /* Конструктор: начальная настройка, подключается к бд */
    function __construct() {
        if ( !class_exists("Config") ) {
            die( "Can't found Config class" );
        }

        $this->link = mysqli_connect( 
            Config::DB_SERVER, 
            Config::DB_USERNAME, 
            Config::DB_PASSWORD, 
            Config::DB_DATABASE
        );
    }

    /* Деструктор: закрывает коннект с БД */
    function __destruct() {
        mysqli_close( $this->link );
    }

    /* Выполнить запрос $sql к БД */
    public function query( $sql ) {
        return $this->link->query( $sql );
    }

    /* Выполнить UPDATE в таблице $table для записи с id $id где установить значения $new_values */
    public function update( $table, $id, $new_values ) {
        $quertyString = "UPDATE " . $table . " SET ";

        foreach( $new_values as $row ) {
            $quertyString .= $row[0] . "='" . $row[1] . "'" . ( (end($new_values) === $row) ? ("") : (",") );
        }

        $quertyString .= " WHERE id=" . $id . ";";

        return $this->query( $quertyString );
    }

    /* Прочитать ответ от БД $query_result и преобразовать его в массив $result с объектами класс $class_name */
    public function fetchQuery( $query_result, $class_name = "stdClass" ) {
        $result = array();

        while ( $row = $query_result->fetch_object($class_name) ) {
            array_push( $result, $row );
        }

        return $result;
    }

}

?>