</header>
<div class='container'>
<div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10">
        <h1><?php echo $article->titre; ?></h1>

        <p><em><?php echo $article->categorie; ?></em></p>

        <h3><?php echo $article->contenu; ?></h3>
    </div>
</div>

<?php
ob_start();
$content = ob_get_clean();
include ROOT . '/app/Views/comments/comments.php';
?>
 
<div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10">
        <p><a href='index.php'>Vers l'accueil</a></p><br/>     
    </div>
</div>
</div>