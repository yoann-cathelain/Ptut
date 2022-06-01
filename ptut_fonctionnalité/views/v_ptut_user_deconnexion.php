<?php
    include_once('../views/v_ptut_navbar.php');
    session_destroy();
    $url_retour = "../views/v_ptut_accueil.php";
    echo "Vous avez été déconnecté <a href='".$url_retour."'>Retour</a>";
?>
