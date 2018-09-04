<?php
namespace App\Controller\Admin;

require_once ROOT . '\app\app.php';
require_once ROOT . '\core\Auth\DbAuth.php';

class AppController extends app\Controller\AppController{
    
    public function __construct(){
        parent::__construct();
        $app = App::getInstance();
        $auth = new DbAuth($app->getDb());
        if(!$auth->logged()){
            $this->Forbidden();
        }
    }

}