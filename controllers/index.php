<?php
class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->msg = "Это главная страница сайта";

        $this->view->render('index/index');

    }
    public function callBack()
    {
        echo $_POST['name'];
    }
    public  function index()
    {
        echo "INSIDE INDEX INDEX";
    }

    public function details()
    {
        $this->view->render('index/index');
    }
}

?>