<?php

class DbAuth{

    private $db;


    public function __construct($db){
        $this->db = $db;
    }

    /**
     * Permet l'authentification a l'administreation du site
     *
     * @param [type] $username
     * @param [type] $password
     * @return bool
     */
    public function login($username, $password){
        $user = $this->db->prepare("SELECT * From users WHERE username = ?", [$username], null, true);
        if($user){
            $verify = password_verify($password, '$2y$10$ZpupoKpUdxLVYRhK3NsijOvxsitCiy5gAQ5/H1yh/aB2FkXWRDjZO');
            if($user->password == $verify ){
                $_SESSION['auth'] = $user->id;
                return true;
            }return false;
        }
            return false;
        }


    public function logged(){
        return isset($_SESSION["auth"]);
    }

    public function getUserId(){
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

}