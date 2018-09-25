<br/>
<br/>
<br/>
<table class="table">
    <thead>
        <tr>
            <td>Signalé ?</td>
            <td>Pseudo</td>
            <td>Mail</td>
            <td>Contenu</td>
            <td>Id</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comments as $comment):?>
        <tr>
            
            <td><?php echo $comment['reported']; ?></td>
            <td><?php echo $comment['pseudo']; ?></td>
            <td><?php echo $comment['mail']; ?></td>
            <td><?php echo $comment['contenu']; ?></td>
            <td><?php echo $comment['id']; ?></td>
            <td>
                <a href="?p=admin.comments.edit&id=<?php echo $comment['id']; ?>" class="btn btn-primary">Editer</a>       
                <form action="?p=admin.comments.delete" style='display: inline;' method="post">
                    <input type="hidden" name='id' value=" <?php echo $comment['id']; ?>">
                
                <button type="submit" class="btn btn-danger">Supprimer</button>       
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>   
</table>
<br/>
<br/>
<br/>

