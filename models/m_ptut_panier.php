<?php
    include_once('../ptut_db_connexion.php');
    if(isset($_SESSION)){
        session_start();
    }
        $queryClients = $db->prepare("SELECT ID_CLIENT FROM clients WHERE NOM = ?");
        $queryClients->execute(["sa"]);

        $client = $queryClients->fetchAll(PDO::FETCH_ASSOC);

        $ArticlePanier = $db->prepare("SELECT * FROM ligne_panier JOIN produits ON ligne_panier.ID_PRODUIT = produits.ID_PRODUIT JOIN panier ON ligne_panier.ID_PANIER = panier.ID_PANIER WHERE ID_CLIENT = ?");
        $ArticlePanier->execute([$client[0]['ID_CLIENT']]);

        $Articles = $ArticlePanier->fetchAll(PDO::FETCH_ASSOC);

        creationPanier($client[0]['ID_CLIENT'],$db);

        $queryPanier = $db->prepare("SELECT * FROM panier WHERE ID_CLIENT = ?");
        $queryPanier->execute([$client[0]['ID_CLIENT']]);

        $panier = $queryPanier->fetchAll(PDO::FETCH_ASSOC);
        $nbArticles = compterArticle($db,$panier[0]['ID_PANIER']);
?>