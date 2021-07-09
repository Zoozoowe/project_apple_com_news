<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/Controller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/dao/User.php";

class ControllerUser extends Controller {
    public function POST( $parsedURI ) {
        $this->setHttpResponseCode( 400 );
        $data = json_decode(json_encode($_POST), FALSE);

        if ( !$data && !$data->email && !$data->password ) {
            $this->setHttpResponseCode( 400 );
            return;
        }

        $userDao = new UserDAO( $this->getConnection() );
        $users  = $userDao->getByEmail( $data->email );

        if ( $users != null ) {
            $this->setHttpResponseCode( 409 );
            return;
        }

        $user = new User();
        $user->setEmail( $data->email );
        $user->setPassHash( sha1($data->password) );

        $userDao->add( $user );
        $this->setHttpResponseCode( 200 );
    }

    public function GET( $parsedURI ) {
        $data = json_decode(json_encode($_GET), FALSE);
        
        $this->setHttpResponseCode( 400 );

        if ( !$data && !$data->email && !$data->password ) {
            $this->setHttpResponseCode( 400 );
            return;
        }

        $userDao = new UserDAO( $this->getConnection() );
        $users  = $userDao->getByEmail( $data->email );

        if ( $users == null ) {
            $this->setHttpResponseCode( 404 );
            return;
        }

        if ($users[0]->getPassHash() != sha1($data->password)) {
            $this->setHttpResponseCode( 400 );
            return;
        }

        $this->setHttpResponseCode( 200 );

        $_SESSION["userid"] = $users[0]->getId();
        return;
    }
}

?>