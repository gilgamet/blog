<?php

class Autoloader{

    static function Autoload($class){
        if(strpos($class . '\\') === 0){
            $class = str_replace(__NAMESPACE__, '', $class);           
            var_dump($class);      
            require __DIR__ . $class . '.php';
        }    
    }

    static function register(){
        $spl = spl_autoload_register(array(__CLASS__, 'Autoload'));
    }

}

