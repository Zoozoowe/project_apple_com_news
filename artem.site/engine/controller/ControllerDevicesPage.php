<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/Controller.php";

class ControllerDevicesPage extends Controller {
    public function GET( $parsedURI ) {
        if ( isset($_SESSION["userid"]) ) {
            $user = (new UserDAO($this->getConnection()))->getById($_SESSION["userid"]);
            $this->getTemplate()->set("USER", $user);
        }

        $this->getTemplate()->set("title",      "Devices");
        $this->getTemplate()->set("subtitle",   "All our devices in one place");

        $this->getTemplate()->display("devices");
    }
}

?>