<?php
    include __DIR__ . '/../ptut_db_connexion.php';

    $queryTrend1 = $db->prepare("SELECT * FROM produits WHERE ID_PRODUIT = 11");
    $queryTrend2 = $db->prepare("SELECT * FROM produits WHERE ID_PRODUIT =  18");
    $queryTrend1->execute();
    $queryTrend2->execute();

    $firstTrend = $queryTrend1->fetchAll(PDO::FETCH_ASSOC);
    $trend = $queryTrend2->fetchAll(PDO::FETCH_ASSOC);