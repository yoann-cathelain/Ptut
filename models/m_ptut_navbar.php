<?php
    include('../ptut_db_connexion.php');
    include('../function/fonction_panier.php');

    $queryClients = $db->prepare("SELECT ID_CLIENT FROM clients WHERE NOM = ?");
    $articlePanier = $db->prepare("SELECT SUM(QUANTITE_PRODUIT) as nbArticle FROM ligne_panier WHERE ID_CLIENT = ?");

    $queryClients->execute(["sa"]);
    $clients = $queryClients->fetchAll(PDO::FETCH_ASSOC);
    $articlePanier->execute([$clients[0]['ID_CLIENT']]);
    $Articles = $articlePanier->fetchAll(PDO::FETCH_ASSOC);

    $nbArticles = $Articles[0]['nbArticle'];