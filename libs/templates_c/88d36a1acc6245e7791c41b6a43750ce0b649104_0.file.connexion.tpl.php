<?php
/* Smarty version 3.1.33, created on 2019-02-17 18:18:30
  from '/Users/Antoinepzt/Documents/WEB/TheBlog/libs/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c69a576a051f1_09729962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88d36a1acc6245e7791c41b6a43750ce0b649104' => 
    array (
      0 => '/Users/Antoinepzt/Documents/WEB/TheBlog/libs/templates/connexion.tpl',
      1 => 1550421567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c69a576a051f1_09729962 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Connexion</h1>
        <!--si variable de session n'est pas vide on affiche la notification!-->
        <?php if (isset($_smarty_tpl->tpl_vars['session_var']->value['notification'])) {?>
          <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['color_notification']->value;?>
 alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <!--on affiche le message !-->
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
