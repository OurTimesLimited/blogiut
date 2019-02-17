<?php
$is_connect =FALSE;
  //permet de vérifier si le sid est présent et si il correspond avec celui dans la BDD pour vérifier la connexion au site WEB
if(isset($_COOKIE['sid']) AND !empty($_COOKIE['sid'])){

  //selection du sid dans la base de données qui correpond à celui présent dans le cookie
  $select = "SELECT * "
          . "FROM user "
          . "WHERE sid = :sid";
  //preparation du résultat
  $sth = $bdd->prepare($select);
  //sécurisation et déclaration des valeurs
  $sth->bindValue(':sid', $_COOKIE['sid'], PDO::PARAM_STR);

  //execution du résultat
  $sth->execute();
  //liste le nombre de ligne présente
  if($sth->rowCount() > 0){
    //creation d'un tableau avec les résultat
    $tab_result_connexion = $sth->fetch(PDO::FETCH_ASSOC);

    $is_connect = TRUE;
  }

}
?>
