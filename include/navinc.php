<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <a class="navbar-brand" href="#">BLOG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=commenter">Accueil</a>
            </li>
            <!-- Si l'utilisateur est connecté / alors il affiche ce lien dans le menu -->
            <?php if(($is_connect) == "TRUE"){
             echo'
            <li class="nav-item">
              <a class="nav-link" href="article.php?action=ajouter">Créer un Article</a>
            </li>'; } ?>
            <!-- Si l'utilisateur est déconnecté / alors il affiche ce lien dans le menu -->
            <?php if(($is_connect) == FALSE){
             echo'
            <li class="nav-item">
              <a class="nav-link" href="user.php">S\'inscrire</a>
            </li>'; } ?>
            <!-- Si l'utilisateur est connecté / alors il affiche ce lien dans le menu -->
            <?php if(($is_connect) == "TRUE"){
             echo'
            <li class="nav-item">
              <a class="nav-link" href="deleteuser.php">Mon Compte</a>
            </li>'; } ?>
            <!-- Si l'utilisateur est déconnecté / alors il affiche ce lien dans le menu -->
            <?php if(($is_connect) == FALSE){
             echo'
            <li class="nav-item">
              <a class="nav-link" href="connexion.php">Connexion</a>
            </li>'; } ?>
            <!-- Si l'utilisateur est connecté / alors il affiche ce lien dans le menu -->
            <?php if(($is_connect) == "TRUE"){
             echo'
            <li class="nav-item">
              <a class="nav-link" href="deconnexion.php">Deconnexion</a>
            </li>'; } ?>
          </ul>

          <!-- Ce formulaire permet de saisir une recherche -->
          <form class="form-inline my-2 my-lg-0"action="index.php" method="get" enctype="multipart/form-data" id="form_search">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" id="search" name="search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" value="Search">Search</button>
          </form>

        </div>
    </nav>
