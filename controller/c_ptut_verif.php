<?php

    include_once('../ptut_db_connexion.php');
    include_once('../models/m_ptut_verif.php');

    session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        $countConnection = count($resultConnection);
        if($countConnection == 1) {
            $_SESSION['username'] = $username;
            header('Location: ../views/v_ptut_user_connecter.php');
        }else {
            header('Location: ../views/v_ptut_user_connexion.php?erreur=1');
        }

    }else {
        header('Location: ../views/v_ptut_user_connexion.php');
    }

?>