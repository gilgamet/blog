<br/><br/>
<form method="post">
    <?php echo $form->input('pseudo', 'pseudo'); ?>
    <?php echo $form->input('mail', null, ['type' => 'email']); ?>
    <?php echo $form->input('contenu', 'Commentaire'); ?>   
    <?php echo $form->input('reported', 'Signalé'); ?>    

    <button class="btn btn-primary">Sauvegarder</button>
</form>    

    <p><a href='index.php'>Vers l'accueil</a></p> 