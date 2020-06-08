<?php
class Controller {
    public $view;

    public function __construct()
    {
        echo "Главный контроллер";
        $this->view = new View();
    }
}
