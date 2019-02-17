<?php
/* Smarty version 3.1.33, created on 2019-01-23 09:19:17
  from '/Users/Antoinepzt/bootstrap/TheBlog/libs/templates/article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c483195c446a5_94550477',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10d6d3574f15a2775ae037545a7c5d88945fb179' => 
    array (
      0 => '/Users/Antoinepzt/bootstrap/TheBlog/libs/templates/article.tpl',
      1 => 1548235133,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c483195c446a5_94550477 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5"><?php echo ucfirst($_smarty_tpl->tpl_vars['action']->value);?>
 un Article</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 text-center">
        <form action="article.php" method="post" enctype="multipart/form-data" id="form_article">

          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php if ($_smarty_tpl->tpl_vars['action']->value == "modifier") {
echo $_smarty_tpl->tpl_vars['id_update_article']->value;
}?>">
          </div>

            <div class="form-group">
              <label for="titre" class="col-form-label">Titre</label>
              <input type="text" class="form-control" id="titre" name="titre" value="<?php if ($_smarty_tpl->tpl_vars['action']->value == "modifier") {
echo $_smarty_tpl->tpl_vars['titre']->value;
}?>" required>
            </div>

          <div class="form-group">
            <label for="texte">Texte</label>
            <textarea class="form-control" id="texte" name="texte" rows="3"required><?php if ($_smarty_tpl->tpl_vars['action']->value == "modifier") {
echo $_smarty_tpl->tpl_vars['texte']->value;
}?></textarea>
          </div>

          <div class="form-group">
            <div class="custom-file">
              <input type="file"  id="image" name="image" class="custom-file-input">
              <label class="custom-file-label" for="image">Choisir un fichier</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-check">
              <label for="publie" class="form-check-label">
              <input type="checkbox"  id="publie" name="publie" class="form-check-input" value="1" <?php if ($_smarty_tpl->tpl_vars['publie']->value == "1") {?> checked <?php }?>> Publié?
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
"><?php echo ucfirst($_smarty_tpl->tpl_vars['action']->value);?>
 l'article</button>
        </form>
      </div>
    </div>
</div>
<?php }
}
