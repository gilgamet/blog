<div class="row">
        <div class="col-sm-1">
        </div>    
        <div class="col-sm-8">
<?php 

foreach($posts as $post) { ?>

        <h2><a href="<?php echo $post->url; ?>"><?php echo $post->titre; ?></a></h2>

        <p><em><?php echo $post->categorie; ?></em></p>
        
        <p><?php echo $post->extrait; ?></p>

<?php } ?>

</div>
        <div class="col-sm-3">

                <ul>    
                        <?php 
                        foreach($categories as $categorie){ ?>
                                <li><a id='categories' href="<?php echo $categorie->url; ?>" >
                                <div id='category'><?php echo $categorie->titre; ?></a></div>
                                </li>
                        <?php }  ?>
                </ul>    
        </div>    
</div>        



        
        

      