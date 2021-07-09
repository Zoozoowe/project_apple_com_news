<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/vendor/rss-php/Feed.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/model/LazyObject.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/engine/Controller.php";


class ControllerNews extends Controller {
    public function GET( $parsedURI ) {
        $newsType = $this->getRouteData("newsType");
        $rssUrl = "";

        switch($newsType) {
            case "movies":
                $rssUrl = 'http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topMovies/limit=10/xml';
            break;

            case "appsFree":
                $rssUrl = 'http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topfreeapplications/limit=10/xml';
            break;

            case "appsPaid":
                $rssUrl = 'http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/toppaidapplications/limit=10/xml';
            break;

            default:
                $rssUrl = 'https://apple.com/newsroom/rss-feed.rss';
        }
        
        $rss = Feed::loadAtom( $rssUrl );

        $news = [];
        
        foreach ($rss->entry as $entry) {
            $current = new LazyObject();
            $current->title = (string)$entry->title;

            if ($entry->link) {
                if ($entry->link[0]) {
                    $current->url       = (string)$entry->link[0]['href'];
                    $current->urlAlt    = (string)$entry->link[0]['title'];
                }

                if ($entry->link[1]) {
                    switch ($entry->link[1]['type']) {
                        case "image/jpeg":
                        case "image/gif":
                            $current->attType   = "image";
                            $current->attUrl    = (string)$entry->link[1]['href'];
                            $current->attAlt    = (string)$entry->link[1]['title'];
                        break;

                        case "video/x-m4v":
                            $current->attType   = "video";
                            $current->attUrl    = (string)$entry->link[1]['href'];
                            $current->attAlt    = (string)$entry->link[1]['title'];
                        break;
                    }

                    array_push( $news, $current );
                }
            }           
        }

        header( 'Content-type: application/json' );
        echo json_encode( $news );
    }
}

?>