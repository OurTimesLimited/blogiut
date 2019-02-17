<?php
session_start();
require_once 'config/init.confg.php';
require_once 'config/bdd.confg.php';
require_once 'include/fonctionsinc.php';
require_once 'include/connexioninc.php';

  //on defini la durée de vie du cookie à -1 pour le détruire
  setcookie('sid', $sid, time() -1);
  //on renvoi vers la page d'accueil
  header("Location: index.php");
?>
