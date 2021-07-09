<?php 

require_once "RoutingEntity.php";

/* Просто обработчик маршрутищзации */
class Router {
    private $rawURI; // URI запроса "как есть"
    private $parsedURI; // обработанный URI запроса

    public function __construct( $requestURI ) {
        $this->rawURI = $requestURI;
        $this->parsedURI = parse_url($requestURI);
    }

    public function getURI() {
        return $this->parsedURI;
    }

    /* Возвращает маршрутизационную сушность \ можно закрепить обработчика */
    public function route( $uri ) {
        return new RoutingEntity( $this, $uri );
    }
}

?>