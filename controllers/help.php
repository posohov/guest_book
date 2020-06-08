<?php

class Help extends Controller
{


    public function __construct()
    {

        parent:: __construct();
        echo "Мы в Help";
    }

   public function index()
    {
        $this->view->render('help/index');
    }
    public function other($arg = false)
    {
        require 'models/help_model.php';
        $model = new Help_Model();
    }


}

?>

