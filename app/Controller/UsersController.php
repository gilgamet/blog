<?php
require_once ROOT . "\core\HTML\BootstrapForm.php";
require_once ROOT . "\core\Auth\DbAuth.php";
require_once ROOT . "\app\App.php";


class UsersController extends AppsController
{
    /**
     * Permet le login de l'utilisateur
     *
     * @return vue (users.login)
     */
    public function login()
    {
        $errors = false;
        if (!empty($_POST)) {
            $auth = new DbAuth(App::getInstance()->getDb());
            if ($auth->login($_POST["username"], $_POST["password"])) {
                header('location: index.php?p=admin.posts.index');
            } else {  
                $errors = true;
            }
        }
        
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }

    /**
     * Se deconnecte de la session en cours
     * @return header('Location')
     */
    public function sign_out() {
        session_destroy();
        header('Location: index.php');
    }
}