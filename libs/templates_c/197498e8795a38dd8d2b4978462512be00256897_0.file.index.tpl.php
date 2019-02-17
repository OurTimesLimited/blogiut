<?php
/* Smarty version 3.1.33, created on 2019-02-11 09:03:15
  from '/Users/Antoinepzt/bootstrap/TheBlog/libs/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c613a53be6264_73680296',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '197498e8795a38dd8d2b4978462512be00256897' => 
    array (
      0 => '/Users/Antoinepzt/bootstrap/TheBlog/libs/templates/index.tpl',
      1 => 1549875794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c613a53be6264_73680296 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-5">
        <h1 class="mt-5">Accueil du blog</h1>
          <?php if (isset($_smarty_tpl->tpl_vars['session_var']->value['notification'])) {?>
          <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['color_notification']->value;?>
 alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
               <?php echo $_smarty_tpl->tpl_vars['session_var']->value['notification']['message'];?>

          </div>
          <?php }?>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-12 text-center">
        <?php if ($_smarty_tpl->tpl_vars['nb_total_article_publie']->value == "0") {
echo $_smarty_tpl->tpl_vars['text_no_result']->value;
}?>
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
                     <a href="#" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</a>
                      <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == "TRUE") {?>
                     <a href="article.php?action=modifier&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-warning" value="Modifier">Modifier</a>
                      <?php }?>
                      <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == "TRUE") {?>
                     <a href="article.php?action=supprimer&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-danger" value="Supprimer">Supprimer</a>
                      <?php }?>
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h5>
                        <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
                        <a href="#" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</a>
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
