<?php
class Error extends Controller
{
    public function __construct()
    {
        parent::__construct();
        echo "Котроллер обработки ошибок";
        $this->view->msg = 'Страницы не существует!';
        $this->view->render('error/index');
    }
}

?>