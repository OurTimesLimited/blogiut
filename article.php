<?php

session_start();
require_once 'config/init.confg.php';
require_once 'config/bdd.confg.php';
require_once 'include/fonctionsinc.php';
require_once 'include/connexioninc.php';

require_once('libs/Smarty.class.php');

//si on on est connecté on affiche le contenu
if ($is_connect == TRUE) {
    //on récupère la valeur action dans l'url
    $action = $_GET['action'];
    $publie = isset($_POST['publie']) ? $_POST['publie'] : 0;

    //Si l'action est égale à supprimer
    if ($action == 'supprimer') {
        //on récupère l'id de l'article dans l'url
        $id_update_article = $_GET['id'];

        //on défini la requête
        $sql_select = "DELETE FROM "
              ."article "
              ."WHERE id = :id ";
        //on prépare la requête
        $sth = $bdd->prepare($sql_select);

        //Déclaration des Paramètres
        $sth->bindValue(':id',$id_update_article,PDO::PARAM_INT);
        //on éxecute la requête
        $sth->execute();

        //puis on défini la requête pour effacer les Commentaires associés à l'article
        $sql_select = "DELETE FROM "
              ."commentaire "
              ."WHERE id_article = :id ";
        //on prépare la requête
        $sth = $bdd->prepare($sql_select);

        //Déclaration des Paramètres
        $sth->bindValue(':id',$id_update_article,PDO::PARAM_INT);

        //on éxecute la requête
        $sth->execute();

        //on défini la valeur de la notification
        $notification = '<b>Félicitation</b> votre article et ses commentaires ont été supprimé de la bdd.';
        //on défini sa couleur
        $result_notification = TRUE;

        $_SESSION['notification']['message'] = $notification;
        $_SESSION['notification']['result'] = $result_notification;
        //on redirige vers l'index
        header("Location:index.php");
        exit();
    }

    //si l'utilisateur a cliquer modifier, on récupère l'id de l'article, et on va récupérer le texte, le titre, et l'état de publication dans la BDD
    if (isset($_GET['id'])) {
        //on récupère l'id de l'article
        $id_update_article = $_GET['id'];
        //on défini la requête
        $sql_select = "SELECT "
            ."titre, "
            ."texte, "
            ."publie "
            ."FROM article "
            ."WHERE id = :id ";
        //preparation de la requête
        $sth = $bdd->prepare($sql_select);

        //sécurisation et déclaration des valeurs
        $sth->bindValue(':id',$id_update_article,PDO::PARAM_INT);
        //execution du résultat
        $sth->execute();
        //creation d'un tableau avec les résultat
        $tab_update = $sth->fetchall(PDO::FETCH_ASSOC);
        //insertion des valeurs dans une boucle
        foreach ($tab_update as $valueUpdate) {
            $titre= $valueUpdate['titre'];
            $texte= $valueUpdate['texte'];
            $publie= $valueUpdate['publie'];
        }
    }else {
        //sinon définir l'id à rien
        $id_update_article = "";
    }

    //si le bouton envoyer n'est pas vide on récupère la date et l'état de publié
    if (isset($_POST['submit'])) {
        print_r2($_POST);
        print_r2($_FILES);

        $publie = isset($_POST['publie']) ? $_POST['publie'] : 0;
        $date= date("y-m-d");

        //si le bouton envoyer est égal à ajouter
        if ($_POST['submit'] == 'ajouter') {

            //on insert l'article
            $sql_insert = "INSERT INTO article "
              ."(titre, texte, publie, date)"
              ."VALUES (:titre, :texte, :publie, :date);";

            $sth = $bdd->prepare($sql_insert);
            //on déclare les paramètres de la requête
            $sth->bindValue(':titre',$_POST['titre'], PDO::PARAM_STR);
            $sth->bindValue(':texte',$_POST['texte'], PDO::PARAM_STR);
            $sth->bindValue(':publie',$publie, PDO::PARAM_BOOL);
            $sth->bindValue(':date',$date, PDO::PARAM_STR);
        }else{
            //sinon on update la bdd de l'article correpondant
            $sql_update = "UPDATE article SET "
              ."titre= :titre, "
              ."texte= :texte, "
              ."publie= :publie "
              ."WHERE id = :id";

            //on prépare la requête
            $sth = $bdd->prepare($sql_update);
            //on déclare les paramètres de la requête
            $sth->bindValue(':titre',$_POST['titre'], PDO::PARAM_STR);
            $sth->bindValue(':texte',$_POST['texte'], PDO::PARAM_STR);
            $sth->bindValue(':publie',$publie, PDO::PARAM_BOOL);
            $sth->bindValue(':id',$_POST['id'], PDO::PARAM_STR);
        }
        //on execute la requête
        $result = $sth->execute();

        //var_dump($result);

        //si submit est égal à ajouter
        if ($_POST['submit'] == 'ajouter') {
            //on défini l'id de l'article a la derniere ligne de la bdd
            $id_update_article = $bdd->lastInsertId();
        }else{
            //sinon on récupère l'id de l'article
            $id_update_article = $_POST['id'];
        }
        //si il n'y a pas d'érreur avec le fichier
        if ($_FILES['image']['error'] == 0) {
            //on recupère les informations du fichier
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            //on défini l'emplacement du fichier uploader
            $result_img = move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $id_update_article . '.' . $extension);
        }

        //si submit est égal à ajouter on défini la notification à inserer un article, sinon on défini la notification à modifier un article
        if ($_POST['submit'] == 'ajouter') {
            $notification = '<b>Félicitation</b> votre article a été inséré dans la bdd.';
        }else{
            $notification = '<b>Félicitation</b> votre article a été modifié dans la bdd.';
        }
        //on déclare la notification à succès
        $result_notification = TRUE;
        //on passe les valeurs de la notification dans la variable de session
        $_SESSION['notification']['message'] = $notification;
        $_SESSION['notification']['result'] = $result_notification;
        //on redirige vers l'index
        header("Location:index.php");
        exit();

    }else{

        $smarty = new Smarty();

        $smarty->setTemplateDir('libs/templates/');
        $smarty->setCompileDir('libs/templates_c/');
        $smarty->setConfigDir('configs/');
        $smarty->setCacheDir('cache/');

        $smarty->assign('action', $action);

        //si action est égal à modifier on assigne les valeur de l'article à modifier
        if ($action == 'modifier') {
            $smarty->assign('titre', $titre);
            $smarty->assign('texte', $texte);
            $smarty->assign('id_update_article', $id_update_article);
            $smarty->assign('publie', $publie);
        }
        //si action est égal à ajouté on assigne la varialbe publié
        if ($action == 'ajouter') {
            $smarty->assign('publie', $publie);
        }
        //** un-comment the following line to show the debug console
        //$smarty->debugging = true;
        //On insert les parties HTML du site
        include_once 'include/headerinc.php';
        include_once 'include/navinc.php';

        $smarty->display('libs/templates/article.tpl');

        include_once 'include/footerinc.php';
    }
  }
?>
