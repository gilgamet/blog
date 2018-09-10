<form method="post">
    <?= $form->input('titre', 'titre de l\'article'); ?>
    <?= $form->input("contenu", 'contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Categorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>    
