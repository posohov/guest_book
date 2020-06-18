<?php

class Bootstrap
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
//        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if(empty($url[0])) {
            require 'controllers/index.php';
            $controllers = new Index();
            $controllers->index();
            return false;

        }
        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            require 'controllers/error.php';
            $error = new Error();
            return false;
        }
        $controllers = new $url[0];
       $controllers->loadModel($url[0]);

        if (isset($url[2])) {
            if(method_exists($controllers, $url[1])) {
                $controllers->{$url[1]}($url[2]);
            } else {
                echo "Error";
            }
            $controllers->$url[1]($url[2]);
        } else {
            if (isset($url[1])) {
                $controllers->{$url[1]}();
            } else {
                $controllers->index();
            }
        }
    }
}


//echo '<hr>';


