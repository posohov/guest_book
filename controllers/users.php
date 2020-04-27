<?php
$errors = [];

if(empty($_POST['name']) ) {
    // setcookie('time', 0, time()+1);
    $errors['name'] = "Введите имя";
}
if (empty($_POST['lastname']) && isset($_POST['submit'])) {
    $errors['lastname'] = "Введите фамилию";
}
if (empty($_POST['message'])) {
    $errors['message'] = "Hello";
}
if (empty($errors)) {
    // setcookie('time', 1, time()-100);
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $message = $_POST['message'];

    include('../models/users.php');
    include('./showUsers.php');
    //TODO редирект на страничку с табличкой юзеров
    header("Location:../views/tableUsers.php");

} else {
include('../views/form.php');

}

?>