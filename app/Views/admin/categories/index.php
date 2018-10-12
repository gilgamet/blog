
<h1>Administrer les categories</h1>

<p>
    <a href="?p=admin.categories.add" class="btn btn-success">Ajouter</a>
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
        <?php foreach($items as $category):?>
        <tr>
            <td><?php echo $category->id; ?></td>
            <td><?php echo $category->titre; ?></td>
            <td>
                <a href="?p=admin.categories.edit&id=<?php echo $category->id; ?>" class="btn btn-primary">Editer</a>       
                <form action="?p=admin.categories.delete" style='display: inline;' method="post">
                    <input type="hidden" name='id' value=' <?php echo $category->id; ?>'>
                
                <button type="submit" class="btn btn-danger">Supprimer</button>       
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>   
</table>

