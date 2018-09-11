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

}