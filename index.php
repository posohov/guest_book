<?php

/*require 'libs/controller.php';
require 'libs/bootstrap.php';
require 'libs/model.php';
require 'libs/view.php';*/
require "config/paths.php";
require "config/database.php";

require 'libs/Database.php';
require 'libs/Session.php';

spl_autoload_register(function($name) {
    require "libs/" . $name . '.php';
});
//print_r(spl_autoload_functions());
//require "./views/form.php";
require_once 'libs/bootstrap.php';
require 'libs/View.php';
$app = new Bootstrap();


//var_dump($_GET);
echo "<hr>";




?>
