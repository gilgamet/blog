
<h1><?=$article->titre; ?></h1>

<p><em><?= $article->categorie; ?></em></p>

<h3><?=$article->contenu; ?></h3><br/>

 <div id="comments" class="comment row" >
        <h4><span class="glyphicon glyphicon-comment"></span> Espace commentaire</h4>
        <div id="newCom"  class="col-sm-12">
            <form method="post">
                <?php echo $form->input('pseudo'); ?>
                <?php echo $form->input('email', null, ['type' => 'email']); ?>
                <?php echo $form->input('commentaire', null, ['type' => 'textarea']); ?>
                <?php echo $form->submit(); ?>
            </form>
        </div>


<p><a href='index.php'>Vers l'accueil</a></p>   
