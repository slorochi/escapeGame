<?php

class Autoloader{
    //attr

    static function register(){

        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload(string $nomClass){
        require $nomClass .".php";
    }
}