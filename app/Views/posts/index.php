
<div class="row">
        <div class="col-sm-8">
        
<?php 



        foreach($posts as $post): ?>

  
                <h2><a href="<?php echo $post->url; ?>"><?php echo $post->titre; ?></a></h2>

                <p><em><?php echo $post->categorie; ?></em></p>
        
                <p><?php echo $post->extrait; ?></p>
                


<?php endforeach; ?>



       
        </div>
<div class="col-sm-4">
        <ul>    
                <?php 
                 foreach($categories as $categorie): ?>
                <li><a href="<?php echo $categorie->url; ?>"><?php echo $categorie->titre; ?></a></li>
                <?php endforeach; ?>
        </ul>    
</div>
</div>

        
        

      