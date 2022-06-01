<?php
    include_once('../ptut_db_connexion.php');

    if(isset($_GET['id'])){
        $query = $db->prepare("SELECT * FROM produits WHERE ID_PRODUIT = ?");
        $query->execute([$_GET['id']]);

        $results = $query->fetchAll(PDO::FETCH_ASSOC);
    }else if(empty($_GET['id'])){}

?>