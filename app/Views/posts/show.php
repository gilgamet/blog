<div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10">
        <h1><?php echo $article->titre; ?></h1>

        <p><em><?php echo $article->categorie; ?></em></p>

        <h3><?php echo $article->contenu; ?></h3><br/>

<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>

    <p>
        <strong><em><?php echo $comment['pseudo']; ?></em></strong>
    </p>
        <p><?php echo $comment->contenu; ?></p>

                        <form action="?p=posts.alert" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $comment['id'] ?>">
                            <input type="hidden" name="comment_id" value="<?php echo $_GET['id'] ?>">
                            <button type="submit" class="btn btn-default btn-sm" data-toggle="confirmation" data-singleton="true"> <i class="glyphicon glyphicon-flag" title="Signaler ce commentaire"></i></button>
                        </form>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>     
            <div class="col-sm-12">Il n'y a pas encore de commentaire sur cet article</div><br/>
        <?php endif; ?>
<?php
ob_start();
$content = ob_get_clean();
require_once 'comments.php';
?>

        <p><a href='index.php'>Vers l'accueil</a></p>
       
    </div>
</div>