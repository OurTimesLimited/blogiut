<!-- Page Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-5">
        <h1 class="mt-5">Accueil du blog</h1>
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
        </div>
    </div>

    <div class="row">
      <div class="col-lg-12 text-center">
        <!--si le nombre d'article est égal à 0 on affiche le contenu de la variable text_no_result!-->
        {if $nb_total_article_publie == "0"}{$text_no_result}{/if}
        <!--on créer une boucle pour afficher les articles!-->
        {foreach from=$tab_bootstrap item=value}
                 <div class="card mb-5">
                   <img class="card-img-top" src="img/{$value.id}.jpg?filemtime({$value.id}.jpg)" alt="Card image cap">
                   <div class="card-body">
                     <h5 class="card-title">{$value.titre}</h5>
                     <p class="card-text">{$value.texte}</p>
                     <a href="#" class="btn btn-secondary">{$value.date_fr}</a>
                     <!--si connecté on affiche le bouton modifier!-->
                      {if $is_connect == "TRUE"}
                     <a href="article.php?action=modifier&id={$value.id}" class="btn btn-warning" value="Modifier">Modifier</a>
                      {/if}
                      <!--si connecté on affiche le bouton supprimer!-->
                      {if $is_connect == "TRUE"}
                     <a href="article.php?action=supprimer&id={$value.id}" class="btn btn-danger" value="Supprimer">Supprimer</a>
                      {/if}
                      <div class="card-body text-center">
                      <h5 class="card-title">Commentaires</h5>
                    <!--on créer une boucle avec les commentaires!-->
                    {foreach from=$tab_commentaire item=valueCom}
                    {if $valueCom.id_article eq $value.id}
                      <p class="card-text"><b>{$valueCom.pseudo}</b> le <b>{$valueCom.date_fr_commentaire}:</b> {$valueCom.texte} </p>
                    {/if}
                    {/foreach}
                    </div>
                    <div class="card-body text-center">
                      <form action="index.php" method="POST" enctype="multipart/form-data" id="form_commentaire" onSubmit="return VerificationSaisie()">

                        <div class="form-group">
                          <input type="hidden" class="form-control" id="id_article" name="id_article" value="{$value.id}">
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
        {/foreach}
      </div>
      <div class="col-md-12">
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
          <!--boucle avec le lien des numéros de pages jusqu'a la dernière page!-->
          {for $i=1 to $nb_pages}
            <li class="page-item"><a class="page-link" href="?page={$i}&search={$search}">{$i}</a></li>
          {/for}
          </ul>
        </nav>
      </div>
  </div>
</div>
