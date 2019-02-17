<!-- Page Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">S'inscrire</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 text-center">
        <form action="user.php" method="post" enctype="multipart/form-data" id="form_user">

          <div class="form-group">
            <label for="nom" class="col-form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer votre Nom" value="" required>
          </div>

          <div class="form-group">
            <label for="prenom" class="col-form-label">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer votre Prénom" value="" required>
          </div>

          <div class="form-group">
            <label for="email" class="col-form-label">Adresse Mail :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre Adresse Mail" value="" required>
          </div>

          <div class="form-group">
            <label for="password">Mot de Passe :</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Entrer votre Mot de Passe" value="" required>
          </div>

          <button type="submit" class="btn btn-primary" name="submit" value="ajouter">Ajouter l'Utilisateur</button>
        </form>
      </div>
    </div>
</div>
