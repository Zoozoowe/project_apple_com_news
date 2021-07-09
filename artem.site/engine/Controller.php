<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/Config.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/interface/IController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/Template.php";

/* Базовы класс обработчика запросов */
class Controller implements IController { 
    private $connection; // соединение к БД
    private $template; // шаблонизатор

    private $router; // маршрутизатор
    private $routingEntity; // маршрутизицонная сущность

    private $requestBody; // тело запроса

    public function __construct( $connection = null ) {
        $this->connection = $connection;
        $this->template = new Template( "/engine/template/" );
        $this->requestBody = file_get_contents( "php://input" ); // получаем тело запроса
    }

    public function getConnection() {
        return $this->connection;
    } 
    
    public function setRouter( $router ) {
        $this->router = $router;
    }

    public function getRouter() {
        return $this->router;
    }

    public function setRoutingEnt( $ent ) {
        $this->routingEntity = $ent;
    }

    public function getRoutingEnt() {
        return $this->routingEntity;
    }

    // "Lazy objects" //

    /* Вернет данные из $routingEntity по ключу $key */
    public function getRouteData( $key ) {
        return $this->getRoutingEnt()->{$key};
    }

    public function getTemplate() {
        return $this->template;
    }

    public function getHttpMethod() {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function setHttpResponseCode( $code ) {
        http_response_code( $code );
    }

    public function getRequestBody() {
        return $this->requestBody;
    }

    public function getRequestBodyJson() {
        return json_decode($this->getRequestBody());
    }

    public function GET( $parsedURI )     { return true; } // стандартный обработчик GET запроса
    public function POST( $parsedURI )    { return true; } // стандартный обработчик POST запроса

    /* Обработчик запросов, все запросы приходят в этот метод */
    public function handle( $parsedURI ) {
        $this->template->set( "ROOT",       Config::SITE_ROOT );
        $this->template->set( "SITE_NAME",  Config::SITE_NAME );

        switch( $this->getHttpMethod() ) {
            case "GET":
                $this->GET($parsedURI);
                break;

            case "POST":
                $this->POST($parsedURI);
                break;

            default:
                return true;
        }
    }
}

?>