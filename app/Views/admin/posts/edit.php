
<br/>
<form method="post">
    <?php echo $form->input('titre', 'titre de l\'article'); ?>
    <?php echo $form->tinyInput("contenu", 'contenu', ['type' => 'textarea']); ?>
    <?php echo $form->select('category_id', 'Categorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>    
