<?php

class Help extends Controller
{


    public function __construct()
    {
        echo "Мы в Help";
        parent:: __construct();
    }

    public function index()
    {
        $this->view->render('help/index');

    }


}

?>