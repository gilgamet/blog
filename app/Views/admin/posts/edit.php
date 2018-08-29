<?php

require_once ROOT . "\App\App.php";
require_once ROOT . "\core\HTML\BootstrapForm.php";
require_once ROOT . "\core\Database\MySqlDatabase.php";


$postTable = App::getInstance()->getTable('Post');
if(!empty($_POST)){
    $result = $postTable->update($_GET['id'],[
        'titre' => $_POST["titre"],
        "contenu" => $_POST["contenu"],
        'category_id' => $_POST["category_id"]
    ]);
 
    if($result){
       
        header('location: admin.php?p=posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
    }
}
$post = $postTable->find($_GET["id"]);
$categories = App::getInstance()->getTable('Category')->extract('id', 'titre');

$form = new BootstrapForm($post);
?>

<form method="post">
    <?= $form->input('titre', 'titre de l\'article'); ?>
    <?= $form->input("contenu", 'contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Categorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>    
