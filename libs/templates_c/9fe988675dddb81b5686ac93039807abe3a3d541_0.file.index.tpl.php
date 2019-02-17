<?php
/* Smarty version 3.1.33, created on 2019-02-17 18:18:21
  from '/Users/Antoinepzt/Documents/WEB/TheBlog/libs/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c69a56d6c2b59_08608542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fe988675dddb81b5686ac93039807abe3a3d541' => 
    array (
      0 => '/Users/Antoinepzt/Documents/WEB/TheBlog/libs/templates/index.tpl',
      1 => 1550426628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c69a56d6c2b59_08608542 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-5">
        <h1 class="mt-5">Accueil du blog</h1>
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
        </div>
    </div>

    <div class="row">
      <div class="col-lg-12 text-center">
        <!--si le nombre d'article est égal à 0 on affiche le contenu de la variable text_no_result!-->
        <?php if ($_smarty_tpl->tpl_vars['nb_total_article_publie']->value == "0") {
echo $_smarty_tpl->tpl_vars['text_no_result']->value;
}?>
        <!--on créer une boucle pour afficher les articles!-->
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_bootstrap']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                 <div class="card mb-5">
                   <img class="card-img-top" src="img/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg?filemtime(<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg)" alt="Card image cap">
                   <div class="card-body">
                     <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h5>
                     <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
                     <a href="#" class="btn btn-secondary"><?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</a>
                     <!--si connecté on affiche le bouton modifier!-->
                      <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == "TRUE") {?>
                     <a href="article.php?action=modifier&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-warning" value="Modifier">Modifier</a>
                      <?php }?>
                      <!--si connecté on affiche le bouton supprimer!-->
                      <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == "TRUE") {?>
                     <a href="article.php?action=supprimer&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-danger" value="Supprimer">Supprimer</a>
                      <?php }?>
                      <div class="card-body text-center">
                      <h5 class="card-title">Commentaires</h5>
                    <!--on créer une boucle avec les commentaires!-->
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_commentaire']->value, 'valueCom');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['valueCom']->value) {
?>
                    <?php if ($_smarty_tpl->tpl_vars['valueCom']->value['id_article'] == $_smarty_tpl->tpl_vars['value']->value['id']) {?>
                      <p class="card-text"><b><?php echo $_smarty_tpl->tpl_vars['valueCom']->value['pseudo'];?>
</b> le <b><?php echo $_smarty_tpl->tpl_vars['valueCom']->value['date_fr_commentaire'];?>
:</b> <?php echo $_smarty_tpl->tpl_vars['valueCom']->value['texte'];?>
 </p>
                    <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                    <div class="card-body text-center">
                      <form action="index.php" method="POST" enctype="multipart/form-data" id="form_commentaire" onSubmit="return VerificationSaisie()">

                        <div class="form-group">
                          <input type="hidden" class="form-control" id="id_article" name="id_article" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
                        </div>

                        <div class="form-group">
                          <label for="pseudo">Pseudo :</label>
                          <input type="text" class="form-control" type="Pseudo" id="pseudo" name="pseudo" aria-label="pseudo">
                        </div>

                          <div class="form-group">
                            <label for="email">E-Mail :</label>
                            <input type="text" class="form-control" type="email" id="email" name="email" aria-label="email">
                          </div>

                        <div class="form-group">
                          <label for="texte_commentaire">Texte :</label>
                          <textarea class="form-control" type="text" id="texte_commentaire" name="texte_commentaire" aria-label="texte_commentaire"></textarea>
                        </div>

                      <button type="submit" class="btn btn-outline-info my-2 my-sm-0" name ="submit" value="Commenter">Commenter</a>
                      </form>
                    </div>
                   </div>
                 </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
      <div class="col-md-12">
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
          <!--boucle avec le lien des numéros de pages jusqu'a la dernière page!-->
          <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nb_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
          <?php }
}
?>
          </ul>
        </nav>
      </div>
  </div>
</div>
<?php }
}
