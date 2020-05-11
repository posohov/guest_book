<?php
//require 'libs/controller.php';
spl_autoload_register(function($name) {
    require "libs/" . $name . '.php';
});
//print_r(spl_autoload_functions());exit;
//require "./views/form.php";
//require_once 'libs/bootstrap.php';
$app = new Bootstrap();


//var_dump($_GET);
echo "<hr>";


/*$con = mysqli_connect(localhost, 'root', '', "guestbook");
if($con){
    echo "Connect DB";
} else {
    echo 'Connect no';
}*/

?>
