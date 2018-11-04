<?php 

require_once ROOT . "\app\Controller\AppsController.php";
require_once ROOT . "\core\Controller\Controller.php";
require_once ROOT . "\app\Table\PostTable.php";
require_once ROOT . "\app\App.php";
require_once ROOT . "\core\Table\Table.php";
require_once ROOT . "\app\Entity\PostEntity.php";
require_once ROOT . '\app\Entity\CategoryEntity.php';
require_once ROOT . "\core\HTML\BootstrapForm.php";
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

    public function index()
    {             
            $posts = App::getInstance()->getTable('Post')->last();
            $categories = App::getInstance()->getTable('Category')->all();     
            $this->render('posts.index', compact('posts', 'categories'));
    }

          /**
     * Création d'un commentaire 
     *  @return request
     */
    public function newComment() 
    {
        if  (isset($_POST['pseudo'], $_POST['email'], $_POST['commentaire']) AND !empty($_POST['pseudo']) AND  !empty($_POST['email']) AND !empty($_POST['commentaire'])) {
        $commentTable = \App::getInstance()->getTable('comments');
            $req = $commentTable->create([
                    'pseudo' => htmlspecialchars($_POST['pseudo']),
                    'mail' => htmlspecialchars($_POST['email']),
                    'contenu' => htmlspecialchars($_POST['commentaire']),
                    'article_id' => $_GET['id']                        
            ]);
        $commentTable = \App::getInstance()->getTable('comments')->getCommentsById($_POST['id']);
        $article = \App::getInstance()->getTable('Post')->extract('id', 'titre', 'contenu');
        $form = new \BootstrapForm($_POST);
        $this->render('admin.comments.edit', compact('commentTable', 'article', 'form'));
        }
    }

    /**
     * remontée d'un commentaire en signalement
     * @return header
     */
    public function report() 
    {
         if (!empty($_POST["report"])) {
                $result = $this->Comments->findComment($_POST['id']);
                $req = $result->reported(
                [
                    "reported" =>$_POST['report'] 
                ]);
        }
        $commentTable = $this->Comments->findComment($_POST['id']);
        $comment = \App::getInstance()->getTable('comments')->extract('id', 'contenu','pseudo');
        $articles = $this->Post->findWithCategory($_GET['id']);
        $article = $this->Post->extract('id','titre', 'category_id', 'contenu');
        $categories = \App::getInstance()->getTable('Category')->extract('id', 'titre');
        $form = new \BootstrapForm($_SESSION);
        $this->render('comments.comments', compact('articles', 'article', 'commentTable', 'comment',  'form'));
    }   
}