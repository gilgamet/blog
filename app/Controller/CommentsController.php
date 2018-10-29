<?php 

require_once ROOT . '\app\app.php';
require_once ROOT . '\app\Controller\AppsController.php';
require_once ROOT . '\app\Table\CommentsTable.php';
require_once ROOT . "\core\HTML\BootstrapForm.php";
require_once ROOT . "\app\Entity\CommentsEntity.php";
require_once ROOT . '\app\controller\PostsController.php';

class CommentsController extends AppsController 
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comments');
    }

    /**
     * remontée d'un commentaire en signalement
     * @return header
     */
    public function report() 
    {
        if (!empty($_POST)) {
            $result = \App::getInstance()->getTable('comments');
            $req = $result->reported(
                [
                    "reported" => $_POST['reported']     
                ]);
        }
            if ($result) { 
            
            }
        $comment = \App::getInstance()->getTable('comments')->extract('id', 'contenu');
        $form = new \BootstrapForm($_POST);
        $this->render('posts.show', compact('comment', 'form'));
    }   
}