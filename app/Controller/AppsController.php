<?php

require_once ROOT .'\core\Controller\Controller.php';
require_once ROOT .'\app\App.php';


class AppsController extends Controller
{

    protected $template = 'default';

    public function __construct()
    {
        $this->viewPath = ROOT . '\\app\\Views\\';
    }

    /**
     * Function de simplification d'appel d'instance
     * @param le model à charger
     */
    protected function loadModel($model_name) {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

}