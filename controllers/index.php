<?php
class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->msg = "Это главная страница сайта";

        return $this->view->render('index/index');

    }
}

?>