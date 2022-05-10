<?php
    include_once('ptut_db_connexion.php');
    session_start();
    $_SESSION['username'] ="";
    $url_retour = "ptut_accueil.php";
    echo "Vous avez été déconnecté <a href='".$url_retour."'>Retour</a>";
?>
