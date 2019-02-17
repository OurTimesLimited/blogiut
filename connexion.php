<?php
session_start();
require_once 'config/init.confg.php';
require_once 'config/bdd.confg.php';
require_once 'include/fonctionsinc.php';
require_once 'include/connexioninc.php';

require_once('libs/Smarty.class.php');

    //on défini souvenirconnexion
    $souvenirConnexion = isset($_POST['souvenir']) ? $_POST['souvenir'] : 0;

    //si la variable notification n'est pas vide on récupère le contenu et on défini la couleur
    if (isset($_SESSION['notification'])) {
      $color_notification = $_SESSION['notification']['result'] == TRUE ? 'success' : 'danger';
    }

    //si la variable submit n'est pas vide
    if (isset($_POST['submit'])) {
        print_r2($_POST);
        print_r2($_FILES);

        //on defini notification
        $notification ="";

        //on défini la requête select
        $sql_insert = "SELECT * "
                ."FROM user "
                ."WHERE email = :email "
                ."AND mdp = :mdp";

        //on prepare la requête
        $sth = $bdd->prepare($sql_insert);

        //on déclare les paramètres de la requête et on crypte le mot de passe via la fonction
        $sth->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
        $sth->bindValue(':mdp',cryptPassword($_POST['password']), PDO::PARAM_STR);

        //on éxecute la requête
        $result = $sth->execute();
        //on pousse les résultat dans un tableau
        $tab_update = $sth->fetchall(PDO::FETCH_ASSOC);

        //on défini une boucle avec les valeurs
        foreach ($tab_update as $valueUpdate) {
          $prenom= $valueUpdate['prenom'];
          $nom= $valueUpdate['nom'];
        }

        //var_dump($result);

        //si le nombre de ligne est inférieur a 1 il y a une erreur
        if ($sth->rowCount() <1) {
            $notification = '<b>Attention</b> login et/ou mot de passe incorrect.';
            $result_notification = FALSE;
            $url_redirect ='connexion.php';
        }else {
            //on défini le sid de l'utilisateur grace à la fonction et la valeur de l'email
            $sid = sid($_POST['email']);

            //on ajoute le sid dans la base de données
            $sql_update = "UPDATE user "
                ."SET sid = :sid "
                ."WHERE email = :email;";

            //on prépare la requête
            $sth_update = $bdd->prepare($sql_update);

            //on déclare les paramètres de la requêtes
            $sth_update->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
            $sth_update->bindValue(':sid',$sid, PDO::PARAM_STR);

            //on éxecute la requête
            $result_update = $sth_update->execute();

            //si souvenirconnexion est = à 1 on défini le temps à 30 jours sinon on défini à 1 heure
            if ($souvenirConnexion == 1) {
              setcookie('sid', $sid, time() +30*24*3600);
            }else{
              setcookie('sid', $sid, time() +3600);
            }

            //on défini le contenu de la notification et le résultat en succès
            $notification = "<b>Félicitation</b> ".$prenom.", Vous êtes bien connecté.";

            $result_notification = TRUE;

            //on défini la redirection vers index.php
            $url_redirect ='index.php';
        }

        //on passe les valeurs de notification en variable de session
        $_SESSION['notification']['message'] = $notification;
        $_SESSION['notification']['result'] = $result_notification;
        //on redirige vers la valeur précedemment indiqué
        header("Location:$url_redirect");

        exit();
    }else{

        $smarty = new Smarty();

        $smarty->setTemplateDir('libs/templates/');
        $smarty->setCompileDir('libs/templates_c/');
        $smarty->setConfigDir('configs/');
        $smarty->setCacheDir('cache/');

        //si la valeur de session notification n'est pas vide
        if (isset($_SESSION['notification'])) {
          //on assigne les valeurs au tpl
          $smarty->assign('session_var', $_SESSION);
          $smarty->assign('color_notification', $color_notification);
          //on vide les valeurs pour que la notification disparaisse au prochain chargement de la page
          unset($_SESSION['notification']);
        }

        //** un-comment the following line to show the debug console
        //$smarty->debugging = true;
        //On insert les parties HTML du site
        include_once 'include/headerinc.php';
        include_once 'include/navinc.php';

        $smarty->display('libs/templates/connexion.tpl');

        include_once 'include/footerinc.php';
    }
?>
