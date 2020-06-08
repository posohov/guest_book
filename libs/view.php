<?php
class View
{
    public function __construct()
    {
        echo "Это Вид. ";
    }

    public function render($name)
    {
        require 'views/' . $name . '.php';
    }
}
?>