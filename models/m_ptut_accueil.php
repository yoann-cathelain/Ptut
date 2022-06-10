<?php
    include __DIR__ . '/../ptut_db_connexion.php';

    $queryTrend1 = $db->prepare("SELECT * FROM produits WHERE ID_PRODUIT = 11");
    $queryTrend2 = $db->prepare("SELECT * FROM produits WHERE ID_PRODUIT =  18");
    $queryTrend1->execute();
    $queryTrend2->execute();

    $firstTrend = $queryTrend1->fetchAll(PDO::FETCH_ASSOC);
    $trend = $queryTrend2->fetchAll(PDO::FETCH_ASSOC);

    $queryCatMonth = $db->prepare("SELECT * FROM produits JOIN produit_cat ON produits.ID_PRODUIT = produit_cat.ID_PRODUIT JOIN categories ON produit_cat.ID_CAT = categories.ID_CAT GROUP BY NOM_CAT LIMIT 3");
    $queryCatMonth->execute();

    $catMonth = $queryCatMonth->fetchAll(PDO::FETCH_ASSOC);

?>