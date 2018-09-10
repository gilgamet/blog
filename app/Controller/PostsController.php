<?php

require_once ROOT . "\app\Controller\AppsController.php";
require_once ROOT . "\core\Controller\Controller.php";
require_once ROOT . "\app\Table\PostTable.php";
require_once ROOT . "\app\App.php";
require_once ROOT . "\core\Table\Table.php";
require_once ROOT . '\app\Entity\PostEntity.php';
require_once ROOT . '\app\Entity\CategoryEntity.php';




class PostsController extends AppsController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function index()
    {             
            $posts = App::getInstance()->getTable('Post')->last();
            $categories = App::getInstance()->getTable('Category')->all();     
            $this->render('posts.index', compact('posts', 'categories'));
    }

    public function category()
    {
        
        $categorie = App::getInstance()->getTable('Category')->find($_GET['id']);
        if ($categorie === false) {
            $this->notFound();
        }
        $articles = App::getInstance()->getTable('Post')->lastByCategory($_GET['id']);
        $categories = App::getInstance()->getTable('Category')->all();
        $this->render('posts.category', compact('articles', 'categories', 'categorie'));
    }

    public function show()
    {
        $article = App::getInstance()->getTable('Post')->findWithCategory($_GET['id']);
        $this->render('posts.show', compact('article'));

    }

}