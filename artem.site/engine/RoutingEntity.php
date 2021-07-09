<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/model/LazyObject.php";

/* Маршрутизационная сущность */
class RoutingEntity extends LazyObject {
    private $router; // маршрутизатор
    private $uri; // URI запроса
    private $isFailed; // true, если один из обработчиков вернул null или false

    public function __construct( $router, $uri ) {
        $this->router = $router;
        $this->uri = $uri;
    }

    /* Установит маршрутизационные данные, которые можно использовать дальше в обработчике */
    public function setRouteData( $key, $value ) {
        parent::_lazySet( $key, $value );
        return $this;
    }

    /* Добавит обработчик на данную сущность */
    public function link( $controller ) {
        if ( $this->router->getURI()["path"] != $this->uri ) {
            $this->isFailed  = true;
        }

        if( !$this->isFailed ) {
            $controller->setRouter( $this->router );
            $controller->setRoutingEnt( $this );
            
            // Вызов обработчика и проверка его выполнения
            if ( !$controller->handle($this->router->getURI()) ) {
                $this->isFailed  = true;
            }
        }

        return $this;
    }
}

?>