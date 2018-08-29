<?php
require_once ROOT . "\App\App.php";
require_once ROOT . "\core\HTML\BootstrapForm.php";


$table = App::getInstance()->getTable('Category');
if(!empty($_POST)){
    $result = $table->update($_GET['id'],[
        'titre' => $_POST["titre"]
    ]);
 
    if($result){
       ?>
       <div class="alert alert-success">La categorie a bien été modifiée</div>
       <?php
    }
}
$categorie = $table->find($_GET["id"]);



$form = new BootstrapForm($categorie);
?>

<form method="post">
    <?= $form->input('titre', 'titre de la categorie'); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>    
