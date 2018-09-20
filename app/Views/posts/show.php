
<h1><?php echo $article->titre; ?></h1>

<p><em><?php echo $article->categorie; ?></em></p>

<h3><?php echo $article->contenu; ?></h3><br/>

<?php 
ob_start();
$content = ob_get_clean();
require_once 'comments.php';
?>

<p><a href='index.php'>Vers l'accueil</a></p>   
