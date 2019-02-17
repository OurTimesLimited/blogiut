<!-- Page Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Connexion</h1>
        <!--si variable de session n'est pas vide on affiche la notification!-->
        {if isset($session_var.notification)}
          <div class="alert alert-{$color_notification} alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <!--on affiche le message !-->
               {$session_var.notification.message}
          </div>
          {/if}
        <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <form action="connexion.php" method="post" enctype="multipart/form-data" id="form_connexion">

          <div class="form-group">
            <label for="email" class="col-form-label">Adresse Mail :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre Adresse Mail" value="" required>
          </div>

          <div class="form-group">
            <label for="password">Mot de Passe :</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Entrer votre Mot de Passe" value="" required>
          </div>

          <div class="form-group">
            <label for="souvenir">Session Active pendant 30 Jours</label>
            <input type="checkbox" name="souvenir" />
          </div>

          <button type="submit" class="btn btn-primary" name="submit" value="ajouter">Se Connecter</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
