<?php
class Bootstrap {
    public function __construct()
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $file = 'controllers/' . $url[0] . '.php';
//        require_once
        if(file_exists($file)) {
            require $file;
        } else {
            require 'controllers/errors.php';
            $errors = new Errors();
            return false;
        }
        $controllers = new $url[0];



        if (isset($url[2])) {
            $controllers->$url[1]($url[2]);
        } else {
            if (isset($url[1])) {
                $controllers->$url[1]();
            }
        }
    }
}
