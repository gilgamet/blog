<?php
namespace App\Controller\Admin;
require_once ROOT . "\app\App.php";
require_once ROOT . "\core\HTML\BootstrapForm.php";
require_once ROOT . "\core\Auth\DbAuth.php";
require_once ROOT . "\app\Controller\Admin\AppController.php";


class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){
        $posts = App::getInstance()->getTable('Post')->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add(){
        $postTable = App::getInstance()->getTable('Post');
        if(!empty($_POST)){
            $result = $this->Post->create([
                'titre' => $_POST["titre"],
                "contenu" => $_POST["contenu"],
                'category_id' => $_POST["category_id"]
    ]);
    if($result){    
        return $this->index();
        }
    }

    $this->loadModel('Category');
    $categories = $this->Category->extract('id', 'titre');
    $form = new BootstrapForm($_POST);
    $this->render('admin.posts.edit', compact('categories', 'form'));
}

    public function edit(){
        if(!empty($_POST)){
            $result = $this->Post->update($_GET['id'],[
                'titre' => $_POST["titre"],
                "contenu" => $_POST["contenu"],
                'category_id' => $_POST["category_id"]
            ]);
         
            if($result){              
                return $this->index();
            }
        }
        $post = $this->Post->find($_GET["id"]);
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($post);  
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function delete(){
        if(!empty($_POST)){
            $result = $this->Post->delete($_POST['id']);     
                return $this->index();
        }
        
    }

}