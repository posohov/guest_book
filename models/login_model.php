<?php
class Login_Model extends Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function run() {
        $sth = $this->database->prepare("INSERT INTO `users` (`id`, `login`, `password`, `time`) VALUES (NULL, '2', '2', CURRENT_TIMESTAMP);");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));

        $data = $sth -> fetchAll();
        $count = $sth->rowCount();
        var_dump($count);
        if($count > 0) {

            Session::init();
            Session::set('loggedIn', true);
            header('Location: ../dashboard');
        } else {

            header('Location: ../login');
        }
    }


}
?>