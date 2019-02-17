<?php
//Affichage des erreurs et avertissements PHP
error_reporting(E_ALL);
if (!ini_get('display_errors')) {
    ini_set("display_errors", 1);
}

//fonction d'affichage des paramètres
function print_r2($param) {
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}

// défini le nombre d'article affiché par page
define('_nb_art_par_page', 2);

?>
