<?php
namespace App\Controller\Admin;
require_once ROOT . "\app\Controller\Admin\AppController.php";
require_once ROOT . "\app\Entity\CategoryEntity.php";
require_once ROOT . "\app\app.php";
require_once ROOT . "\core\HTML\BootstrapForm.php";
/**
 * Class CategoriesController
 * Genère les pages index, ajout, edition et delete
 */
class CategoriesController extends AppController {

    /**
     *  Charge le model des categories
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * La vue de la page index
     */
    public function index() {
        $items = \App::getInstance()->getTable('Category')->all();
        \App::getInstance()->title = "Gestion des categories";
        $this->render('admin.categories.index', compact('items'));
    }

    /**
     * La vue de la page add
     * Si ajout, retour sur la page d'index
     */
    public function add() {
        if (!empty($_POST)) {
            $result = \App::getInstance()->getTable('Category')->create([
                'titre' => $_POST['titre'],
            ]);
            return $this->index();
        }
        $form = new \BootstrapForm($_POST);
        $this->render('admin.categories.edit', compact('form'));
    }

    /**
     * Vue de la page d'édition
     * Si édition, retour sur l'index 
     */
    public function edit() {
        if (!empty($_POST)) {
            $result = \App::getInstance()->getTable('Category')->update($_GET['id'], [
                'titre' => $_POST['titre'],
            ]);
            return $this->index();
        }
        $category = \App::getInstance()->getTable('Category')->find($_GET['id']);
        $form = new \BootstrapForm($category);
        $this->render('admin.categories.edit', compact('form'));
    }

    /**
     * Supprime la categorie ciblée avec l'Id
     */
    public function delete() {
        if (!empty($_POST)) {
            $result = \App::getInstance()->getTable('Category')->delete($_POST['id']);
            return $this->index();
        }
    }

}
