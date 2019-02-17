<?php
session_start();
require_once 'config/init.confg.php';
require_once 'config/bdd.confg.php';
require_once 'include/fonctionsinc.php';
require_once 'include/connexioninc.php';

require_once('libs/Smarty.class.php');

  //si le POST du submit n'est pas vide
  if (isset($_POST['submit'])) {
    print_r2($_POST);
    print_r2($_FILES);

    //on insert les valeurs saisie dans la bdd
    $sql_insert = "INSERT INTO user "
    ."(nom, prenom, email, mdp)"
    ."VALUES (:nom, :prenom, :email, :mdp);";

    $sth = $bdd->prepare($sql_insert);

    //on passe les variables en paramètres
    $sth->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
    $sth->bindValue(':prenom',$_POST['prenom'], PDO::PARAM_STR);
    $sth->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
    $sth->bindValue(':mdp',cryptPassword($_POST['password']), PDO::PARAM_STR);

    //on execute la requête
    $result = $sth->execute();

    //var_dump($result);

    //si le résultat est TRUE alors on notifie en vert avec succès, sinon on notifie en rouge avec echec
    if($result ==TRUE) {
      $notification = '<b>Félicitation</b> votre user a été inséré dans la bdd.';
      $result_notification = TRUE;
    }else {
      $notification = 'Erreur d\'insertion dans la bdd.';
      $result_notification = FALSE;
    }

    $_SESSION['notification']['message'] = $notification;
    $_SESSION['notification']['result'] = $result_notification;

    //on renvoi vers la page d'accueil
    header("Location:index.php");
    exit();
  }else {

      $smarty = new Smarty();

      $smarty->setTemplateDir('libs/templates/');
      $smarty->setCompileDir('libs/templates_c/');
      $smarty->setConfigDir('configs/');
      $smarty->setCacheDir('cache/');

      //** un-comment the following line to show the debug console
      //$smarty->debugging = true;
      //On insert les parties HTML du site
      include_once 'include/headerinc.php';
      include_once 'include/navinc.php';

      $smarty->display('libs/templates/user.tpl');

      include_once 'include/footerinc.php';
    }

?>
