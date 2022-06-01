<?php  

    include_once('../ptut_db_connexion.php');

    if(isset($_GET['id'])){
        $queryProduit = $db->prepare("SELECT * FROM produits WHERE ID_PRODUIT = ? ");
        $queryProduit->execute([$_GET['id']]);
    
        $produits = $queryProduit->fetchAll(PDO::FETCH_ASSOC);
    }else  {
        throw new Exception("Unknown id_product", $_GET['id']);
    }



?>

