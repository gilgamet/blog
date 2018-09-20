
<h1><?= $categorie->titre; ?></h1>

<div class="row">
        <div class="col-sm-8">
        
        <?php 




foreach($articles as $post): ?>

  
        <h2><a href="<?php echo $post->url ;?>"><?php echo $post->titre; ?></a></h2>

        <p><em><?php echo $post->categorie;?></em></p>
        
        <p><?php echo $post->extrait; ?></p>


<?php endforeach; ?>



       
        </div>
<div class="col-sm-4">
        <ul>    
                <?php foreach($categories as $categorie): ?>
                <li><a href="<?php echo $categorie->url; ?>"><?php echo $categorie->titre; ?></a></li>
                <?php endforeach; ?>
        </ul>    
</div>
</div>  
        <p><a href='index.php'>Vers l'accueil</a></p>   
        
        

      