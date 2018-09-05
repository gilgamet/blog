<?php
namespace App\Controller\Admin;

require_once ROOT . '\app\app.php';
require_once ROOT . '\core\Auth\DbAuth.php';
require_once ROOT . "\app\Controller\AppController.php";

class AppController extends AppController{
    
    public function __construct(){
        parent::__construct();
        $app = App::getInstance();
        $auth = new DbAuth($app->getDb());
        if(!$auth->logged()){
            $this->Forbidden();
        }
    }

}