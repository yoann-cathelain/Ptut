<?php
    include_once('../models/m_ptut_panier.php');

    if(isset($_GET['id_produit'])){
            ajoutArticle($db,$panier[0]['ID_PANIER'],$_GET['id_produit'],1);
            header("Location: ../view/v_ptut_panier.php");

    }else if(isset($_GET['action'])){
        $action = $_GET['action'];

        if($action == "supprimer") {
                supprimerArticle($db,$_GET['id']);
                header("Location: ../view/v_ptut_panier.php");
        }
    }


    