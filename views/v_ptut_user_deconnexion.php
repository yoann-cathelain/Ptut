<?php
    session_start();
    $_SESSION['username'] ="";
    $url_retour = "../views/v_ptut_accueil.php";
    echo "Vous avez été déconnecté <a href='".$url_retour."'>Retour</a>";
?>
