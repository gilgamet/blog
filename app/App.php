<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App 
{
    
    public $title = "Billet simple pour l'Alaska";
    private $db_instance;
    private static $_instance;
    
    /**
     * (Singleton)
     * 
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
                self::$_instance = new App();
        }
            return self::$_instance;
    }
    
    /**
     * Démarre une session
     * charges les autoloader 
     */
    public static function load() {
        session_start();
        require_once ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require_once ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }
    
    /**
     * Définie la classe en cours pour cibler la table
     * @param string $name nom de la class
     * @return string
     * MAGIQUE !
     */

    public function getTable($name) {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }
    
    /**
     * Récupère ou créé l'instance de connexion à la bdd a l'aide du fichier config.php
     */
    public function getDb() 
    {
        $config = Config::getInstance(ROOT . '/config/config.php');
        if (is_null($this->db_instance)) {
            $this->db_instance = new MySqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
            }
            return $this->db_instance;
    }
  
}


    
   