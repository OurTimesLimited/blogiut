<?php
/* Smarty version 3.1.33, created on 2019-01-23 12:58:26
  from '/Users/Antoinepzt/bootstrap/TheBlog/libs/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c4864f287d954_02832410',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9045a349d5c9ffe348eeb7ac1f2290f11b9dbc33' => 
    array (
      0 => '/Users/Antoinepzt/bootstrap/TheBlog/libs/templates/connexion.tpl',
      1 => 1548248305,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c4864f287d954_02832410 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Connexion</h1>
        <?php if (isset($_smarty_tpl->tpl_vars['session_var']->value['notification'])) {?>
          <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['color_notification']->value;?>
 alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
               <?php echo $_smarty_tpl->tpl_vars['session_var']->value['notification']['message'];?>

          </div>
          <?php }?>
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
<?php }
}
