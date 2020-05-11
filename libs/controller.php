<?php
class Controller {
    public function __construct()
    {
        echo "Главный контроллер";
        $this->view = new View();
    }
}
