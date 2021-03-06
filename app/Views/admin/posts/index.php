</header>
<div class='container' id='pindex'>
    <div class='row'>
        <div class="col-sm-8"> 
            <h1>Administrer les articles</h1>
        </div>
    </div>
<p>
    <a href="?p=admin.posts.add" class="btn btn-success">Ajouter un article</a>
    <a href="?p=admin.categories.index" class="btn btn-success">Gérer les chapitres</a>
    <a href="?p=admin.comments.index" class="btn btn-success">Gérer les commentaires</a>
</p>

<table class="table">
    <thead>
        <tr>
            <td>Id</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post){?>
        <tr>
            <td><?php echo $post->id; ?></td>
            <td><?php echo $post->titre; ?></td>
            <td>
                <a href="?p=admin.posts.edit&id=<?php echo $post->id; ?>" class="btn btn-primary">Editer</a>
                <form action="?p=admin.posts.delete" style='display: inline;' method="post">
                    <input type="hidden" name='id' value='<?php echo $post->id; ?>'>
                <button type="submit"  class="btn btn-danger">Supprimer</button>       
                </form>
            </td>
        </tr>
        <?php } ?>
    </tbody>   
</table>



