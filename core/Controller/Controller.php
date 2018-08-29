<?php

class Controller{

    protected $viewPath;
    protected $template;

    protected function render($view, $variables = []){
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'template/' . $this->template . '.php');
        var_dump($this->viewpath);
    }

    protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('acces interdit');
    }

    protected function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('page Introuvable');
    }
}