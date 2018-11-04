<?php

define('ROOT', dirname(__DIR__));
   require_once ROOT . "\app\App.php";
   require_once ROOT . "\app\Controller\PostsController.php";
   require_once ROOT . '\app\Controller\CommentsController.php';
   require_once ROOT . "\app\Controller\Admin\PostsController.php";
   require_once ROOT . "\app\Controller\Admin\CategoriesController.php";
   require_once ROOT . "\app\Controller\UsersController.php";
   require_once ROOT . "\app\Controller\Admin\CommentsController.php";
   App::load();
   

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'posts.index';
}
   
$page = explode('.', $page);
if ($page[0] == 'admin') {
    $controller = '\app\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else {
    $controller =  ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}
$controller = new $controller();

$controller->$action();
