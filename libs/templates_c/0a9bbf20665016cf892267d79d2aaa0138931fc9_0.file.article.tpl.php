<?php
/* Smarty version 3.1.33, created on 2019-02-17 18:20:16
  from '/Users/Antoinepzt/Documents/WEB/TheBlog/libs/templates/article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c69a5e09723e0_93948018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a9bbf20665016cf892267d79d2aaa0138931fc9' => 
    array (
      0 => '/Users/Antoinepzt/Documents/WEB/TheBlog/libs/templates/article.tpl',
      1 => 1550421623,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c69a5e09723e0_93948018 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <!--on affiche l'action de l'article!-->
        <h1 class="mt-5 mb-5"><?php echo ucfirst($_smarty_tpl->tpl_vars['action']->value);?>
 un Article</h1>
      </div>
    </div>
      <div class="card mb-2">
      <div class="col-lg-12 text-center">
        <form action="article.php" method="post" enctype="multipart/form-data" id="form_article">

          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php if ($_smarty_tpl->tpl_vars['action']->value == "modifier") {
echo $_smarty_tpl->tpl_vars['id_update_article']->value;
}?>">
          </div>

            <div class="form-group">
              <label for="titre" class="col-form-label">Titre :</label>
              <input type="text" class="form-control" id="titre" name="titre" value="<?php if ($_smarty_tpl->tpl_vars['action']->value == "modifier") {
echo $_smarty_tpl->tpl_vars['titre']->value;
}?>" required>
            </div>

          <div class="form-group">
            <label for="texte">Texte :</label>
            <!--si action=modifier on afiche le texte-->
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
          <!--on affiche l'action de l'article!-->
          <button type="submit" class="btn btn-info mb-2" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
"><?php echo ucfirst($_smarty_tpl->tpl_vars['action']->value);?>
 l'article</button>
        </form>
      </div>
    </div>
</div>
<?php }
}
