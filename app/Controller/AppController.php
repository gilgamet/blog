<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class AppController extends Controller
{

    protected $template = 'default';

    public function __construct()
    {
        $this->viewPath = ROOT . '/app/Views/';
    }

    /**
     * Function de simplification d'appel d'instance
     * @param le model à charger
     */
    protected function loadModel($model_name) {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

}