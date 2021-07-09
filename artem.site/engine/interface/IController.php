<?php 

/* Интерфейс обработчика */
interface IController {
    public function handle( $parsedURI );
    
    public function getHttpMethod();

    public function setRouter( $router );
    public function getRouter();

    public function setHttpResponseCode( $code );
}

?>