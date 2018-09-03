
<div class="row">
        <div class="col-sm-8">
        
<?php 
require_once ROOT . "\app\Controller\PostsController.php";


        foreach($posts as $post): ?>

  
                <h2><a href="<?= $post['url']; ?>"><?= $post['titre']; ?></a></h2>

                <p><em><?= $post['categorie']; ?></em></p>
        
                


<?php endforeach; ?>



       
        </div>
<div class="col-sm-4">
        <ul>    
                <?php 
                 foreach($categories as $categorie): ?>
                <li><a href="<?= $categorie['url']; ?>"><?= $categorie['titre']; ?></a></li>
                <?php endforeach; ?>
        </ul>    
</div>
</div>  
        
        
        

      