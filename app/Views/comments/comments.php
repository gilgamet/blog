
<?php if(!empty($comments)) { 

    foreach ($comments as $comment) { ?>
        <div class="row" >
            <div class="col-sm-1">
            </div>
                <div class="col-sm-8">
                    <p>
                        <strong><em><?php echo htmlspecialchars($comment->pseudo); ?></em></strong>
                    </p>
                    <p><?php echo htmlspecialchars($comment->contenu); ?></p>

                    <form  method="post" style="display: inline;">      
                    <input type="hidden" name="id" value="<?= $comment->id ?>"> 
                    <?php echo $form->signal() ?>
                    </form>

                </div>
        </div>
        <?php }        
    } else { ?>     
    <div class="col-sm-12">Il n'y a pas encore de commentaire sur cet article</div><br/>
<?php } ?>

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
</div>
</div>


