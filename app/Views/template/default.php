
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Billet simple pour l'Alaska</title>       
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="../public/css/blog.css" rel="stylesheet">
    </head>

    <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
          </div>
          <div class="col-4 text-center">
            <p class="blog-header-logo">BILLET SIMPLE POUR L'ALASKA</p>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <?php if (isset($_SESSION['auth'])):?>
            <a class="btn btn-sm btn-outline-secondary" href="?p=admin.posts.index">Gestion des articles</a>
            <a class="btn btn-sm btn-outline-secondary" href="index.php?p=users.sign_out">Se deconnecter</a>
            <?php else: ?>
            <a class="btn btn-sm btn-outline-secondary" href="index.php?p=users.login">Connexion</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
        </nav>
      </div>

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Billet simple pour l'alaska</h1>
          <p class="lead my-3">Blog de la parution Online de mon livre: Billet simple pour l'alaska</p>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">World</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#"></a>
              </h3>
              <div class="mb-1 text-muted"></div>
              <p class="card-text mb-auto">Ex turba vero imae sortis et <br/>paupertinae in tabernis aliqui<br/> pernoctant vinariis non nulli velariis umbraculorum theatralium latent, quae Campanam ...</p>
              <a href="index.php?p=posts.show&id=7">Lire la suite</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" src="..\public\images\Plane.jpg" alt="Card image cap">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-success">Design</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#"></a>
              </h3>
              <div class="mb-1 text-muted"></div>
              <p class="card-text mb-auto">Nascitur diversitate potest inanes<br/> pomerium coluntur mmmmmmm</p>
              <a href="index.php?p=posts.show&id=8">Lire la suite</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" src="..\public\images\Alaska.jpg" alt="Card image cap" height="311.2" width="358.483">
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
</div>
</div>

    <?php echo $content; ?>
    
    <?php if (isset($_SESSION['auth'])):?>
    <?php else: ?>
      <footer class="blog-footer">
      <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col-sm-4">
          <p>
          <br/><br/><a href="#">Back to top</a><br/>
            © Jean Forteroche tous droits réservés<br/>
            © Jean Forteroche All rights reserved 
          </p>   
    </div>
          <div class="col-sm-4">
          <p>
            <br/><br/><i class="fab fa-twitter-square"></i><a href="https://twitter.com/forteroche">Twitter</a>
            <br/><i class="fab fa-facebook"></i><a href="https://www.facebook.com/profile.php?id=100017965573700&lst=100014582262490%3A100017965573700%3A1531465999&sk=friends&source_ref=pb_friends_tl">Facebook</a>
          </p>
          </div>
    </div><!-- /.row -->  
    </footer>
    <?php endif; ?>

       <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

     <script type='text/javascript' src='../public/js/plugins/tinymce.min.js'></script>
    <script type="text/javascript" src="../public/js/plugins/init_tinymce.js"></script>    
    </body>
    </html>