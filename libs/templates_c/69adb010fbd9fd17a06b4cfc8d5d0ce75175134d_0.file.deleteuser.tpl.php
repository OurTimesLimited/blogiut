<?php
/* Smarty version 3.1.33, created on 2019-01-26 21:01:53
  from '/Users/Antoinepzt/bootstrap/TheBlog/libs/templates/deleteuser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c4ccac1cea204_54607980',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69adb010fbd9fd17a06b4cfc8d5d0ce75175134d' => 
    array (
      0 => '/Users/Antoinepzt/bootstrap/TheBlog/libs/templates/deleteuser.tpl',
      1 => 1548258415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c4ccac1cea204_54607980 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Page Content -->
<div class="container">

  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Modifier mon Compte</h1>
    </div>
  </div>

    <div class="col-lg-12 text-center">
      <form action="deleteuser.php" method="post" enctype="multipart/form-data" id="form_updateuser">

        <div class="form-group">
          <label for="email" class="col-form-label">Adresse Mail :</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre Adresse Mail" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit" value="email">Modifier l'email</button>
      </form>

      <form action="deleteuser.php" method="post" enctype="multipart/form-data" id="form_updatemdpuser">
        <div class="form-group">
          <label for="password">Mot de Passe :</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Entrer votre Mot de Passe" value="" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit" value="password">Modifier le mot de passe</button>
      </form>
    </div>
  </div>

    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Supprimer mon Compte</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 text-center">
        <form action="deleteuser.php" method="post" enctype="multipart/form-data" id="form_deleteuser">

          <div class="form-group">
            <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
          </div>

          <button type="submit" class="btn btn-primary" name="submit" value="delete">Supprimer l'Utilisateur</button>
        </form>
      </div>
    </div>
</div>
<?php }
}
