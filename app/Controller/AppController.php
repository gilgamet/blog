<?php

require_once ROOT .'\core\Controller\Controller.php';
require_once ROOT .'\app\App.php';
require_once ROOT .'\app\Controller\PostsController.php';

class AppController extends Controller{

    protected $template = 'default';

    public function __construct(){
        $this->viewPath = ROOT . '\\app\\Views\\';
    }

    protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getTable($model_name);
    }
}