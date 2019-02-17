<?php
session_start();
require_once 'config/init.confg.php';
require_once 'config/bdd.confg.php';
require_once 'include/fonctionsinc.php';
require_once 'include/connexioninc.php';

require_once('libs/Smarty.class.php');

    //si on on est connecté on affiche le contenu
    if ($is_connect == TRUE) {

      //on selectionne l'adresse  mail de l'utilisateur grace à son sid
      $sql_select = "SELECT "
        ."email "
        ."FROM user "
        ."WHERE sid = :sid";

    //preparation du résultat
    $sth = $bdd->prepare($sql_select);

    //sécurisation et déclaration des valeurs
    $sth->bindValue(':sid',$_COOKIE['sid'],PDO::PARAM_STR);
    //execution du résultat
    $sth->execute();
    //creation d'un tableau avec les résultat
    $tab_update = $sth->fetchall(PDO::FETCH_ASSOC);

    //on défini une boucle avec les valeurs
    foreach ($tab_update as $valueUpdate) {
      $email= $valueUpdate['email'];
    }
        //si la valeur de submit n'est pas vide
        if (isset($_POST['submit'])) {
          print_r2($_POST);
          print_r2($_FILES);

            //et si elle contien "email"
            if ($_POST['submit'] == 'email') {

              //alors on update dans la base la valeur de l'email grace au sid
              $sql_update = "UPDATE user SET "
                ."email = :email "
                ."WHERE sid = :sid";

              //on prepare le résultat
              $sth = $bdd->prepare($sql_update);

              //on déclare les paramètres de la requêtes
              $sth->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
              $sth->bindValue(':sid',$_COOKIE['sid'], PDO::PARAM_STR);

              //on execute la requête
              $result = $sth->execute();

              //var_dump($result);
            }

            // si la valeur de submit contient password
            if ($_POST['submit'] == 'password') {

              //on update la valeur du mdp dans la base
              $sql_update = "UPDATE user SET "
                ."mdp = :mdp "
                ."WHERE sid = :sid";

              //on prépare la requête
              $sth = $bdd->prepare($sql_update);

              //on déclare les paramètres de la requêtes et on crypte le mdp via la fonction
              $sth->bindValue(':mdp',cryptPassword($_POST['password']), PDO::PARAM_STR);
              $sth->bindValue(':sid',$_COOKIE['sid'], PDO::PARAM_STR);

              //on éxecute la requête
              $result = $sth->execute();

              //var_dump($result);
            }

            //on défini la variable email
            $email = $email_connect;

            // si la valeur de submit contient delete
            if ($_POST['submit'] == 'delete') {
              // on prérare la requête de supression la
              $sth=$bdd->prepare('DELETE from user WHERE email = :email');


              //on déclare les paramètres de la requêtes
              $sth->bindValue(':email', $email, PDO::PARAM_STR);
              //on execute la requête
              $sth->execute();
              session_destroy();
            }
            //on renvoi vers la page d'accueil
            header("Location:index.php");

            exit();
        }else{

          $smarty = new Smarty();

          $smarty->setTemplateDir('libs/templates/');
          $smarty->setCompileDir('libs/templates_c/');
          $smarty->setConfigDir('configs/');
          $smarty->setCacheDir('cache/');

          $smarty->assign('email', $email);

          //si submit n'est pas vide
          if (isset($_POST['submit'])) {
            //on assigne la valeur de l'email
            $smarty->assign('email', $email);
          }

          //** un-comment the following line to show the debug console
          //$smarty->debugging = true;
          //On insert les parties HTML du site
          include_once 'include/headerinc.php';
          include_once 'include/navinc.php';

          $smarty->display('libs/templates/deleteuser.tpl');

          include_once 'include/footerinc.php';
        }
    }
?>
