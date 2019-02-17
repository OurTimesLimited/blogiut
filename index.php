<?php
session_start();
require_once 'config/init.confg.php';
require_once 'config/bdd.confg.php';
require_once 'include/fonctionsinc.php';
require_once 'include/connexioninc.php';

require_once('libs/Smarty.class.php');

    //si la variable session notification n'est pas vide on lui attribue une couleur en fonction du result
    if (isset($_SESSION['notification'])) {
        $color_notification = $_SESSION['notification']['result'] == TRUE ? 'success' : 'danger';
    }


    //Si le bouton submit du formulaire commentaire n'est pas vide
    if (isset($_POST['submit'])) {

        //on récupère la date à l'instant T et lon la met dans une variable
        $date = date("Y-m-d H:i:s");

        //on insert le commentaire
        $sql_insert = "INSERT INTO commentaire "
        ."(id_article, pseudo, email_auteur, texte, date)"
        ."VALUES (:id_article, :pseudo, :email_auteur, :texte_commentaire, :date)";

        $sth = $bdd->prepare($sql_insert);

        //on déclare les paramètres de la requête
        $sth->bindValue(':id_article',$_POST['id_article'], PDO::PARAM_INT);
        $sth->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
        $sth->bindValue(':email_auteur',$_POST['email'], PDO::PARAM_STR);
        $sth->bindValue(':texte_commentaire',$_POST['texte_commentaire'], PDO::PARAM_STR);
        $sth->bindValue(':date',$date, PDO::PARAM_STR);

        //on execute la requête
        $sth->execute();

        //on définit la notification succès
        $notification = '<b>Félicitation</b> votre commentaire a été inséré de la bdd.';

        $result_notification = TRUE;

        $_SESSION['notification']['message'] = $notification;
        $_SESSION['notification']['result'] = $result_notification;

        //on renvoi vers la page d'accueil
        header("Location:index.php");
        exit();

    }

    //on défini la page courante
    $page_courante = !empty($_GET['page']) ? $_GET['page'] : 1;
    //on défini l'index de déprat de grace au nombre d'article par page ainsi qu'a la page courante
    $index_depart_MYSQL = indexPagination($page_courante, _nb_art_par_page);

    // Je teste pour savoir si la variable search dans l'url contient quelque chose
    if(!empty($_GET['search'])) {
    // J'ai quelque chose donc je peux continuer

        //je récupère la valeur search dans l'url
        $search = $_GET['search'];

        //je défini la requête sql de selection des articles en fonction de la recherche
        $sql_select = "SELECT "
            ."id, "
            ."titre, "
            ."texte, "
            ."publie, "
            ."DATE_FORMAT(date, '%d/%m/%y') as date_fr "
            ."FROM article "
            ."WHERE publie = :publie "
            ."AND (titre LIKE :search OR texte LIKE :search OR date LIKE :search) "
            ."LIMIT :index_depart, :nb_limit";
        /*@var $bdd PDO*/
        $sth = $bdd->prepare($sql_select);


        //on déclare les paramètres de la requêtes
        $sth->bindValue(':publie',1,PDO::PARAM_BOOL);
        $sth->bindValue(':nb_limit',_nb_art_par_page,PDO::PARAM_INT);

        $sth->bindValue(':index_depart',$index_depart_MYSQL,PDO::PARAM_INT);
        $sth->bindValue(':search', '%' . $_GET['search'] . '%',PDO::PARAM_STR);

        //on éxecute la requête
        $sth->execute();

        //on insère le le résultat dans un tableau
        $tab_bootstrap = $sth->fetchAll(PDO::FETCH_ASSOC);

        //Puis on selectionne les commentaires
        $sql_select = "SELECT "
            ."id_article, "
            ."pseudo, "
            ."texte, "
            ."DATE_FORMAT(date, '%d/%m/%y %H:%i:%s') as date_fr_commentaire "
            ."FROM commentaire ";
        /*@var $bdd PDO*/
        $sth = $bdd->prepare($sql_select);

        //on éxecute la requête
        $sth->execute();

        //on pousse le résultat dans un tableau
        $tab_commentaire = $sth->fetchAll(PDO::FETCH_ASSOC);

        //on défini la variable du nombre totale d'article via la fonction correspondante pour la recherche
        $nb_total_article_publie = nb_total_article_publie_like($bdd,$search);

        //on définit le nombre de pages en fonction du nombre d'article publié et du nombre d'article par page
        $nb_pages = ceil($nb_total_article_publie / _nb_art_par_page);
    }else{

        //sinon si pas de recherche on selectionne tous les articles publié
        $sql_select = "SELECT "
            ."id, "
            ."titre, "
            ."texte, "
            ."publie, "
            ."DATE_FORMAT(date, '%d/%m/%y') as date_fr "
            ."FROM article "
            ."WHERE publie = :publie "
            ."LIMIT :index_depart, :nb_limit";
        /*@var $bdd PDO*/
        $sth = $bdd->prepare($sql_select);

        //on déclare les paramètres de la requêtes
        $sth->bindValue(':publie',1,PDO::PARAM_BOOL);
        $sth->bindValue(':index_depart',$index_depart_MYSQL,PDO::PARAM_INT);
        $sth->bindValue(':nb_limit',_nb_art_par_page,PDO::PARAM_INT);

        $sth->execute();

        //on pousse le résultat dans un tableau
        $tab_bootstrap = $sth->fetchAll(PDO::FETCH_ASSOC);

        //Puis on selectionne les commentaires
        $sql_select = "SELECT "
            ."id_article, "
            ."pseudo, "
            ."texte, "
            ."DATE_FORMAT(date, '%d/%m/%y %H:%i:%s') as date_fr_commentaire "
            ."FROM commentaire ";
        /*@var $bdd PDO*/
        $sth = $bdd->prepare($sql_select);

        //on éxecute la requête
        $sth->execute();

        //on pouse le résultat dans un tableau
        $tab_commentaire = $sth->fetchAll(PDO::FETCH_ASSOC);

        //on défini la variable du nombre totale d'article publié via la fonction correspondante
        $nb_total_article_publie = nb_total_article_publie($bdd);

        //on définit le nombre de pages en fonction du nombre d'article publié et du nombre d'article par page
        $nb_pages = ceil($nb_total_article_publie / _nb_art_par_page);
    }



    $smarty = new Smarty();
    $smarty->setTemplateDir('libs/templates/');
    $smarty->setCompileDir('libs/templates_c/');
    $smarty->setConfigDir('configs/');
    $smarty->setCacheDir('cache/');


    //si la varriable notification n'est pas vide, on assigne dans le tpl la valeur de la session et la couleur de notification
    if (isset($_SESSION['notification'])) {
        $smarty->assign('session_var', $_SESSION);
        $smarty->assign('color_notification', $color_notification);
        unset($_SESSION['notification']);
    }

    //on assigne dans le tpl la valeur du nombre total d'article publié
    $smarty->assign('nb_total_article_publie', $nb_total_article_publie);

    //si le champ recherche et vide je déclare la variable vide et l'assigne
    if(empty($_GET['search'])) {
        $search="";
        $smarty->assign('search', $search);
    }

    //si le champ recherche n'est pas vide j'assigne la valeur
    if(!empty($_GET['search'])) {
        $smarty->assign('search', $search);
    }

    //si le nombre total article est égal à 0 et la recherche est vide alors on indique qu'aucun article n'est disponible et on assigne
    if(($nb_total_article_publie) == 0 && $search == "" ) {
        $text_no_result ="<p>Aucun Article sur ce Blog!</p>";
        $smarty->assign('text_no_result', $text_no_result);
    }else{
      //sinon le nombre total article est égal à 0 alors on indique qu'aucun résultat ne correspond à la recherche et on assigne
        $text_no_result ="<p>Aucun résultat ne correspond à votre recherche!</p>";
        $smarty->assign('text_no_result', $text_no_result);

    }

    //on assigne les différentes variables dont on a besoin
    $smarty->assign('tab_bootstrap', $tab_bootstrap);
    $smarty->assign('tab_commentaire', $tab_commentaire);
    $smarty->assign('is_connect', $is_connect);
    $smarty->assign('nb_pages', $nb_pages);

    //** un-comment the following line to show the debug console
    //$smarty->debugging = true;
    //On insert les parties HTML du site
    include_once 'include/headerinc.php';
    include_once 'include/navinc.php';

    $smarty->display('libs/templates/index.tpl');

    include_once 'include/footerinc.php';

?>
