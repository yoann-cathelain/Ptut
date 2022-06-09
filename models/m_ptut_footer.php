<?php 

    include_once('../ptut_db_connexion.php');

    $queryProduct = $db->prepare("SELECT * FROM categories");
    $queryProduct->execute();

    $Product = $queryProduct->fetchAll(PDO::FETCH_ASSOC);