<?php
    include_once('../ptut_db_connexion.php');
    if(isset($_SESSION)){
        session_start();
    }
    if(isset($_GET['user']) && !empty($_GET['user'])) {
        $queryClients = $db->prepare("SELECT ID_CLIENT FROM clients WHERE NOM = ?");
        $queryClients->execute([$_GET['user']]);

        $client = $queryClients->fetchAll(PDO::FETCH_ASSOC);
    }else {
        header('Location: ../view/v_ptut_connexion.php');
    }
    if(isset($_GET['id_produit']) || isset($client) && isset($_GET['user']) && !empty($_GET['user'])){


        $ArticlePanier = $db->prepare("SELECT * FROM ligne_panier JOIN produits ON ligne_panier.ID_PRODUIT = produits.ID_PRODUIT JOIN panier ON ligne_panier.ID_PANIER = panier.ID_PANIER WHERE ID_CLIENT = ?");
        $ArticlePanier->execute([$client[0]['ID_CLIENT']]);

        $Articles = $ArticlePanier->fetchAll(PDO::FETCH_ASSOC);

        creationPanier($client[0]['ID_CLIENT'],$db);

        $queryPanier = $db->prepare("SELECT * FROM panier WHERE ID_CLIENT = ?");
        $queryPanier->execute([$client[0]['ID_CLIENT']]);

        $panier = $queryPanier->fetchAll(PDO::FETCH_ASSOC);
    }else if(empty($GET['user'])){
        header('Location: ../view/v_ptut_connexion.php');
    }


?>