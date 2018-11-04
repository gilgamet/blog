<?php

require_once ROOT . "\app\Controller\AppsController.php";
require_once ROOT . "\core\Controller\Controller.php";
require_once ROOT . "\app\Table\PostTable.php";
require_once ROOT . "\app\App.php";
require_once ROOT . "\core\Table\Table.php";
require_once ROOT . "\app\Entity\PostEntity.php";
require_once ROOT . '\app\Entity\CategoryEntity.php';
require_once ROOT . "\core\HTML\BootstrapForm.php";
require_once ROOT . '\app\controller\CommentsController.php';




class PostsController extends AppsController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comments');
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
       if (!empty($_POST['pseudo'])){
            $result = $this->Post->newComment();
                 if ($result)  {
                    unset($_POST['pseudo']);
                    unset($_POST['mail']);
                    unset($_POST['contenu']);
                    return $this->show();
            }
       }else if (!empty($_POST['report'])){
            $this->Comments->reported($_POST['id']);
       }      
        $comments = $this->Comments->getCommentsById($_GET['id']);
        $article = App::getInstance()->getTable('Post')->findWithCategory($_GET['id']);
        $form = new BootstrapForm($_POST);
        $this->render('posts.show', compact('article', 'comments', 'form'));
    }

 
    
}
