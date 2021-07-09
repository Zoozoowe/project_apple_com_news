<?php 

/* Ленивый объект, позволяет задавать своие свойства и методы на ходу \ используется для передачи информации */
class LazyObject implements JsonSerializable {
    private $data = array();
    
    public function __set( $key, $value ) {
        $this->data[$key] = $value;
        return $this;
    }

    public function _lazySet( $key, $value ) {
        return $this->__set($key, $value);
    }

    public function __get( $key ) {
        if( isset($this->data[$key]) )
		{	
			return $this->data[$key];
		}
    }

    public function _lazyGet( $key ) {
        return $this->__get( $key );
    }

    public function jsonSerialize() {
        return $this->data;
    }
}

?>