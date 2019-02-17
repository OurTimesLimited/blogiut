
<!-- Page Content -->
<div class="container">

  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5 mb-5">Modifier mon Compte</h1>
    </div>
  </div>
  <div class="card mb-2">
    <div class="col-lg-12 text-center">
      <form action="deleteuser.php" method="post" enctype="multipart/form-data" id="form_updateuser">

        <div class="form-group">
          <label for="email" class="col-form-label">Adresse Mail :</label>
          <input type="email" class="form-control" id="email" name="email" value="{$email}" required>
        </div>
          <button type="submit" class="btn btn-warning" name="submit" value="email">Modifier l'Adresse E-mail</button>
      </form>
    </div>

    <div class="col-lg-12 text-center">
      <form action="deleteuser.php" method="post" enctype="multipart/form-data" id="form_updatemdpuser">
        <div class="form-group">
          <label class="mt-5" for="password">Mot de Passe :</label>
          <input type="password" class="form-control" id="password" name="password" value="" required>
        </div>
        <button type="submit" class="btn btn-warning mb-2" name="submit" value="password">Modifier le Mot de Passe</button>
      </form>
  </div>
</div>
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5 mb-5">Supprimer mon Compte</h1>
      </div>
    </div>

    <div class="card mb-5">
    <div class="row">
      <div class="col-lg-12 text-center">
        <form action="deleteuser.php" method="post" enctype="multipart/form-data" id="form_deleteuser">

          <div class="form-group">
            <input type="hidden" class="form-control" id="email" name="email" value="{$email}">
          </div>

          <button type="submit" class="btn btn-danger mb-2" name="submit" value="delete">Supprimer l'Utilisateur</button>
        </form>
      </div>
    </div>
  </div>
</div>
