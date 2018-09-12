
<h1>Administrer les articles</h1>

<p>
    <a href="?p=admin.posts.add" class="btn btn-success">Ajouter</a>
    <a href="?p=admin.categories.index" class="btn btn-success">Gérer les catégories</a>
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
        <?php foreach($posts as $post):?>
        <tr>
            <td><?= $post->id; ?></td>
            <td><?= $post->titre; ?></td>
            <td>
                <a href="?p=admin.posts.edit&id=<?php echo $post->id; ?>" class="btn btn-primary">Editer</a>
                <form action="?p=admin.posts.delete" style='display: inline;' method="post">
                    <input type="hidden" name='id' value='<?php echo $post->id; ?>'>
                
                <button type="submit"  class="btn btn-danger">Supprimer</button>       
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>   
</table>

