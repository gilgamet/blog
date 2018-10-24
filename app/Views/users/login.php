<div class="row">
    <div class="col-sm-1">
    </div>    
        <div class="col-sm-8">
<?php
    if ($errors): ?>
        <div class="alert alert-danger">
            Identifiants incorrects
        </div>
<?php endif; ?>        

<form method="post">
    <?php echo $form->input('username', 'Pseudo'); ?>
    <?php echo $form->input("password", 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form> 
<br/><br/><br/><br/><br/><br/><br/></div> 