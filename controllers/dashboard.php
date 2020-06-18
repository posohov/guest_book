<?php

Class Dashboard extends Controller
{
    function __construct()
    {
        parent::__construct();
//        $this->view->render('login/index');
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('Location: ../login');
            exit();
        }
    }
    public function index()
    {
        require'models/login_model.php';
        $model = new Login_Model();
        $this->view->render('dashboard/index');
    }

    public function logout()
    {
        Session::destroy();
        header('Location: ../login');
        exit();
    }
}
?>