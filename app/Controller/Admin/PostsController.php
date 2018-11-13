<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use App;

/**
 * Class PostsController
 * Genère les vues des pages category, add, delete, edit et index
 */
class PostsController extends AppController
{
    /**
     * Constructeur qui reprend le constructeur du parent  
     */
    public function __construct()
    {
        parent::__construct();
    }

    /** 
     * 
    */
    public function index()
    {
        $posts = App::getInstance()->getTable('Post')->all();
        App::getInstance()->title = "Gestion des Articles";
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add()
    {
        $postTable = App::getInstance()->getTable('Post');
        if (!empty($_POST)) {
            $result = $postTable->create
            ([
                'titre' => $_POST["titre"],
                "contenu" => $_POST["contenu"],
                'category_id' => $_POST["category_id"] 
            ]);
            if ($result) {    
                return $this->index();
            }
    }
            $categories = App::getInstance()->getTable('Category')->extract('id', 'titre');
            $form = new BootstrapForm($_POST);
            $this->render('admin.posts.edit', compact('categories', 'form'));
}

    /** Génere la vue Edit
     * 
     * @param POST 
     * @return html & $category $post
     */
    public function edit()
    {
        if (!empty($_POST)) {
            $result = App::getInstance()->getTable('Post')->update($_GET['id'], [
                'titre' => $_POST["titre"],
                "contenu" => $_POST["contenu"],
                'category_id' => $_POST["category_id"]
            ]);
         
            if ($result) {              
                return $this->index();
            }
        }
        $post = App::getInstance()->getTable('Post')->find($_GET["id"]);
        $categories = App::getInstance()->getTable('Category')->extract('id', 'titre');
        $form = new BootstrapForm($post);  
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $result = App::getInstance()->getTable('Post')->delete($_POST['id']);
                return $this->index();
        }
    }
}