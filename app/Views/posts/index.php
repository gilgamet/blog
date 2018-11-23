<div class="container" id="posts">
    <div class='row' id="post">
        <div class="col-sm-8 col-md-8 col-lg-8">
            <?php foreach($posts as $post) { ?>

            <h2><a href="<?php echo $post->url; ?>"><?php echo $post->titre; ?></a></h2>

            <p><em><?php echo $post->categorie; ?></em></p>
        
           <p><?php echo $post->extrait; ?></p>
    
           <?php } ?>

        </div>
              
        <div class="p-3 mb-3" id='categorie'>
           <div class="p-3">
                <ul>    
                    <?php foreach($categories as $categorie){ ?>
                                <li><a href="<?php echo $categorie->url; ?>" >
                                <div><?php echo $categorie->titre; ?></div></a>
                                </li>
                    <?php }  ?>
                </ul>       
         </div>
     </div>
</div>      


      


        
        

      