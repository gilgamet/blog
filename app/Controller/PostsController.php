<?php

require_once ROOT . "\app\Controller\AppController.php";
require_once ROOT . "\core\Controller\Controller.php";
require_once ROOT . "\app\Table\PostTable.php";

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel = ('Post');
        $this->loadModel = ('Category');
    }

    /**
     *
     */
    public function index(){
        var_dump($this->Posts);
        $posts = $this->Posts->last();
        var_dump($posts);
        die();
        $categories = $this->Category->all();
        $this->render('posts.index', compact('posts', 'categories'));
    }

    public function category(){

        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }
        $articles = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('articles','categories', 'categorie'));
    }

    public function show(){
        $article = $this->Post->findWithCategory($_GET['id']);
        $this->render('posts.show', compact('article'));

    }

}