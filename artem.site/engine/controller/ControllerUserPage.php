<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/Controller.php";

class ControllerUserPage extends Controller {
    public function GET( $formatedURI ) {
        if( isset($_SESSION["userid"]) ) {
            header("Location: /");
            return;
        }

        $action = $this->getRouteData( "action" );
        $template = "";

        switch ( $action ) {
            case "registration":
                $this->getTemplate()->set("title", "Registration");
                $this->getTemplate()->set("subtitle", "Please, provide information about you");
                $template = "register";
            break;

            case "login":
                $this->getTemplate()->set("title", "Login");
                $template = "login";
            break;
        }

        $this->getTemplate()->set( "action", $action );
        $this->getTemplate()->display( $template );
    }

    private function isUserExists( $id ) {
        $userDao = new UserDAO( $this->getConnection() );
        $users = $userDao->getById($id);
        
        if ( !$users ) {
            return false;
        }

        return true;
    }
}

?>