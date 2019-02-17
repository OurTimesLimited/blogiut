<?php
//Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=Blog2019;charset=utf8','usertest', 'test');
    $bdd->exec("Set names utf8");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' .$e->getMessage());
}
