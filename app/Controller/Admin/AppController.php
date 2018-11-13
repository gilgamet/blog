<?php

namespace App\Controller\Admin;

use \App;
use \Core\Auth\DBAuth;

/**
 * Class AppController
 * Connexion Admin
 */

class AppController extends \App\Controller\AppController {

    /**
     * Si l'utilisateur n'est pas identifié, page d'erreur
     */
    public function __construct() {
        parent::__construct();
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if (!$auth->logged()) {
            $this->forbidden();
        }
    }

}

