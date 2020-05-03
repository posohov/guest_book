<?php
class Help {


    public function __construct()
    {
        echo "Мы в Help";
    }
    public function other($name="Stas")
    {

        echo "Мы в методе Other   " . $name;
    }


}

?>