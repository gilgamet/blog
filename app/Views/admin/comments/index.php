</header>
<div class="container" id='cindex'>
    <div class='row'>
        <div class ='col-sm-11'>
            <table class="table">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Signalé ?</td>
                        <td>Pseudo</td>
                        <td>Mail</td>
                        <td>Contenu</td>          
                   
                    </tr>
                </thead>
            <tbody>
                <?php foreach($comments as $comment) {?>
                    <tr>
                        <td><?php echo htmlspecialchars($comment->id); ?></td>
                        <td><?php echo htmlspecialchars($comment->reported); ?></td>
                        <td><?php echo htmlspecialchars($comment->pseudo); ?></td>
                        <td><?php echo htmlspecialchars($comment->mail); ?></td>
                        <td><?php echo htmlspecialchars($comment->contenu); ?></td> 
            
                    <td>
                        <a href="?p=admin.comments.edit&id=<?php echo $comment->id; ?>" class="btn btn-primary">Editer</a>       
                        <form action="?p=admin.comments.delete" style='display: inline;' method="post">
                        <input type="hidden" name='id' value=" <?php echo $comment->id; ?>">
                
                        <button type="submit" class="btn btn-danger">Supprimer</button>       
                        </form>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>   
            </table>
        </div>
    </div>
</div>


