<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/Controller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/dao/User.php";

class ControllerNewsPage extends Controller {
    public function GET( $parsedURI ) {
        $newsType = $this->getRouteData( "newsType" );

        if ( isset($_SESSION["userid"]) ) {
            $user = (new UserDAO($this->getConnection()))->getById($_SESSION["userid"]);
            $this->getTemplate()->set("USER", $user);
        }

        switch($newsType) {
            case "movies":
                $this->getTemplate()->set("title", "Top Movies");
                $this->getTemplate()->set("subtitle", "Top 10 movies by user choice");
            break;

            case "appsFree":
                $this->getTemplate()->set("title", "Top 10 (Free Apps)");
                $this->getTemplate()->set("subtitle", "Most popular free apps from store");
            break;

            case "appsPaid":
                $this->getTemplate()->set("title", "Top 10 (Paid Apps)");
                $this->getTemplate()->set("subtitle", "Most popular paid apps from store");
            break;

            default:
                $this->getTemplate()->set("title", "Apple Newsroom");
                $this->getTemplate()->set("subtitle", "Fresh insides");
        }

        $this->getTemplate()->set("newsType", $newsType);
        $this->getTemplate()->display("news");
    }
}

?>