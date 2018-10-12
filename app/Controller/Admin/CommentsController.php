<?php

namespace App\Controller\Admin;
use App\Controller\Admin\AppController;

require_once ROOT . '\app\app.php';
require_once ROOT . '\app\Controller\AppsController.php';
require_once ROOT . '\app\Table\CommentsTable.php';
require_once ROOT . "\core\HTML\BootstrapForm.php";
require_once ROOT . "\app\Entity\CommentsEntity.php";


class CommentsController extends AppController
{
     /**
     * Charge les modeles des commentaires en corrélation avec les articles
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Génere la vue index
     */
    public function index() {
        $comments = \App::getInstance()->getTable('comments')->lastComment();
        \App::getInstance()->title = "Gestion des commentaires";      
        $this->render('admin.comments.index', compact('comments'));
    }

       /** Génere la vue Edit
     * @param POST 
     * @return html & $category $post
     */
    public function edit()
    {
        if (!empty($_POST)) {
            $result = \App::getInstance()->getTable('comments')->update($_GET['id'], [
                'pseudo' => $_POST["pseudo"],
                "contenu" => $_POST["contenu"],
                "reported" => $_POST["reported"],
                "mail" => $_POST['mail'],
                
            ]);
         
            if ($result) {              
                return $this->index();
            }
        }
        $comment = \App::getInstance()->getTable('comments')->find($_GET['id']);
        $article = \App::getInstance()->getTable('Post')->extract('id', 'titre');
        $form = new \BootstrapForm($comment);  
        $this->render('admin.comments.edit', compact('article', 'form'));
    }

    /**
     * Supprime le commentaire passé en POST (id)
     * @return html
     */
    public function delete() {
        if (!empty($_POST)) {
            $result = \App::getInstance()->getTable('comments')->delete($_POST['id']);
            return $this->index();
        }
    }
  
}
