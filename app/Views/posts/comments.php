
<div id="comments" class="comment row" >
<h4><span class="glyphicon glyphicon-comment"></span> Commentaire</h4>
<div id="newCom"  class="col-sm-12">
    <form method="post">
        <?php echo $form->input('pseudo'); ?>
        <?php echo $form->input('email', null, ['type' => 'email']); ?>
        <?php echo $form->input('commentaire', null, ['type' => 'textarea']); ?>
        <?php echo $form->submit(); ?>
    </form>
    <br/>
</div>
<br/>

