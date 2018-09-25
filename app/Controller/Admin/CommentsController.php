<?php

namespace App\Controller\Admin;
use App\Controller\Admin\AppController;

require_once ROOT . '\app\app.php';
require_once ROOT . '\app\Controller\AppsController.php';
require_once ROOT . '\app\Table\CommentsTable.php';
require_once ROOT . "\core\HTML\BootstrapForm.php";


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
        $comments = \App::getInstance()->getTable('comments')->getAllComments();
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
                "mail" => $_POST['mail'],
                'article_id' => $_POST["article_id"]
            ]);
         
            if ($result) {              
                return $this->index();
            }
        }
        $comment = \App::getInstance()->getTable('comments')->find($_GET['id']);
        $form = new \BootstrapForm($comment);  
        $this->render('admin.comments.edit', compact('form'));
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

    /**
     * Genere la page show
     * @return html
     */
    public function show() {
        $comments = \App::getInstance()->getTable('comments')->getCommentsById($_GET['id']);
        App::getInstance()->title = $comment[0]->username . " - Billet simple pour l'Alaska";
        $this->render('admin.comments.show', compact('comments'));
    }
}
