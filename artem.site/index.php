<?php 

session_start();

include_once "engine/Router.php";
include_once "engine/Connection.php";

include_once "engine/controller/ControllerNews.php";
include_once "engine/controller/ControllerUser.php";
include_once "engine/controller/ControllerDevices.php";

include_once "engine/controller/ControllerNewsPage.php";
include_once "engine/controller/ControllerUserPage.php";
include_once "engine/controller/ControllerDevicesPage.php";

require_once "/engine/dao/User.php";

$router = new Router($_SERVER["REQUEST_URI"]);
$connection = new Connection();

// Проверка на авторизацию \ в userid хранится текущий id пользователя
if ( isset($_SESSION["userid"]) ) {
    $userDao = new UserDAO( $connection );
    $users = $userDao->getById( $_SESSION["userid"] );
            
    if ( !$users )
        unset($_SESSION["userid"]);
}

/* API */

$router
    ->route("/api/news")
    ->setRouteData("newsType", "default")
    ->link(new ControllerNews());

$router
    ->route("/api/news/movies")
    ->setRouteData("newsType", "movies")
    ->link(new ControllerNews());

$router
    ->route("/api/news/apps/free")
    ->setRouteData("newsType", "appsFree")
    ->link(new ControllerNews());

$router
    ->route("/api/news/apps/paid")
    ->setRouteData("newsType", "appsPaid")
    ->link(new ControllerNews());

$router
    ->route("/api/user/auth")
    ->link(new ControllerUser($connection));
    
$router
    ->route("/api/devices")
    ->link(new ControllerDevices($connection));

/* Page displaying */

$router
    ->route("/")
    ->setRouteData("newsType", "default")
    ->link(new ControllerNewsPage($connection));

$router
    ->route("/news/movies")
    ->setRouteData("newsType", "movies")
    ->link(new ControllerNewsPage($connection));

$router
    ->route("/news/freeapps")
    ->setRouteData("newsType", "appsFree")
    ->link(new ControllerNewsPage($connection));

$router
    ->route("/news/paidapps")
    ->setRouteData("newsType", "appsPaid")
    ->link(new ControllerNewsPage($connection));

$router
    ->route("/registration")
    ->setRouteData("action", "registration")
    ->link(new ControllerUserPage($connection));

$router
    ->route("/login")
    ->setRouteData("action", "login")
    ->link(new ControllerUserPage($connection));

$router
    ->route("/devices")
    ->link(new ControllerDevicesPage($connection));

?>