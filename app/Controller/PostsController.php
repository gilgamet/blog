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
        $commentTable = \App::getInstance()->getTable('comments');
        $article = App::getInstance()->getTable('Post')->findWithCategory($_GET['id']);
        $form = new \BootstrapForm($_POST);
        $this->render('posts.show', compact('article', 'form'));
    }

        /**
     * Création d'un commentaire 
     *  @return request
     */
    public function save() 
    {
        $commentTable = \App::getInstance()->getTable('comments');
        $errors = [];
        if (empty($_POST['pseudo'])) {
            $errors['pseudo'] = "Vous n'avez pas rentré de pseudo";
        }
        if (empty($_POST['mail']) || filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = "Erreur d'email";
        }
        if (empty($_POST['commentaire'])) {
            $errors['contenu'] = "Erreur de contenu";
        }
        $req = $commentTable->create([
                    'pseudo' => $_POST['pseudo'],
                    'mail' => $_POST['mail'],
                    'contenu' => $_POST['commentaire'],
                    'ref' => 'articles'
        ]);
        if ($req) {    
            return $this->index();
        }
    }

}