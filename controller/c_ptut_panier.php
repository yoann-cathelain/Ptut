<?php
    include_once('../models/m_ptut_panier.php');
    if(isset($panier[0]['ID_PANIER'])){
        if(isset($_GET['id_produit']) && isset($_GET['user'])){
            ajoutArticle($db,$panier[0]['ID_PANIER'],$_GET['id_produit'],1);
            header('Location: ../view/v_ptut_panier.php?user='.$_GET['user']);

    }
    if(isset($_GET['action']) && isset($_GET['user'])){
        $action = $_GET['action'];

        if($action == "supprimer") {
                supprimerArticle($db,$_GET['id']);
                header("Location: ../view/v_ptut_panier.php?user=".$_GET['user']);
        }
    }
    if(!empty($panier)){
        $nbArticles = compterArticle($db,$panier[0]['ID_PANIER']);
    }else {
        $nbArticles = 0;
    }

    }

    