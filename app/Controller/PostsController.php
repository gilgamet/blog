<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;
use App\Table\CommentTable;
use App;

class PostsController extends AppController
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
            $posts = $this->Post->last();
            $categories = $this->Category->all();     
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
