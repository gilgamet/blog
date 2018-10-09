<?php

require_once ROOT . "\app\Controller\AppsController.php";
require_once ROOT . "\core\Controller\Controller.php";
require_once ROOT . "\app\Table\PostTable.php";
require_once ROOT . "\app\App.php";
require_once ROOT . "\core\Table\Table.php";
require_once ROOT . '\app\Entity\PostEntity.php';
require_once ROOT . '\app\Entity\CategoryEntity.php';
require_once ROOT . "\core\HTML\BootstrapForm.php";




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
        $commentTable = App::getInstance()->getTable('comments');
        if (!empty($_POST['pseudo'])) {
            $result = $this->newComment();
            if ($result) {
                unset($_POST['pseudo']);
                unset($_POST['mail']);
                unset($_POST['contenu']);
                unset($_POST['reported']);
                return $this->show();
            }
        }
        
        $article = App::getInstance()->getTable('Post')->findWithCategory($_GET['id']);
        $form = new BootstrapForm($_POST);
        $this->render('posts.show', compact('article', 'commentTable', 'form'));
    }

        /**
     * Création d'un commentaire 
     *  @return request
     */
    public function newComment() 
    {
        $commentTable = \App::getInstance()->getTable('comments');
        $errors = [];
        if (!empty($_POST)) {
        
        $req = $commentTable->create([
                    'pseudo' => $_POST['pseudo'],
                    'mail' => $_POST['email'],
                    'contenu' => $_POST['commentaire'],
                    'article_id' => $_GET['article_id']
        ]);
        if ($req) 
            {    
                return $this->index();
            }
        }
        $article = \App::getInstance()->getTable('Post')->extract('id', 'titre');
        $form = new \BootstrapForm($_POST);
        $this->render('admin.comments.edit', compact('article', 'form'));

    }
    
}