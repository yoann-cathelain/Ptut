<?php

    include_once('../models/m_ptut_verif.php');

    session_start();
    if(isset($_POST['email']) && isset($_POST['password'])){
        $countConnection = count($resultConnection);
        if($countConnection == 1) {
            echo $resultConnection[0]['NOM'];
            $_SESSION['username'] = $resultConnection[0]['NOM'];
            header('Location: ../index.php');
        }else {
            header('Location: ../view/v_ptut_connexion.php?erreur=1');
        }

    }else {
        header('Location: ../views/v_ptut_connexion.php');
    }

?>