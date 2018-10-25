
<?php if(!empty($comments)): ?>

    <?php foreach ($comments as $comment): ?>
        <div class="row" >
            <div class="col-sm-1">
            </div>
                <div class="col-sm-8">
                    <p>
                        <strong><em><?php echo htmlspecialchars($comment->pseudo); ?></em></strong>
                    </p>
                    <p><?php echo htmlspecialchars($comment->contenu);?></p>

                    <form action="?p=posts.show&id= <?php echo $_GET['id']; ?>" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?php echo $comment->id ?>">
                        <input type="hidden" name="reported" value="<?php echo $comment->reported?>">
                        <button type="submit" class="btn btn-default btn-sm"  title="<?php echo $comment->id; ?> <?php echo $comment->reported ?>">Signaler ce commentaire</button>
                    </form>
                    <br/><br/><br/>
                </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>     
    <div class="col-sm-12">Il n'y a pas encore de commentaire sur cet article</div><br/>
<?php endif; ?>

<div id="comments" class="row" >
<div class="col-sm-1">
</div>
<div class="col-sm-10"><br/>
<h4><div class="glyphicon glyphicon-comment">Commentaire</div></h4>
    <form method="post">
        <?php echo $form->input('pseudo'); ?>
        <?php echo $form->input('email', null, ['type' => 'email']); ?>
        <?php echo $form->input('commentaire', null, ['type' => 'textarea']); ?>    
        <?php echo $form->submit(); ?>
    </form>
    <br/><br/><br/>
</div>
</div>


