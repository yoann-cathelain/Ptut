<?php  

    include_once('../ptut_db_connexion.php');

    if(isset($_GET['id'])){
        $queryProduit = $db->prepare("SELECT * FROM produits WHERE ID_PRODUIT = ? ");
        $queryProduit->execute([$_GET['id']]);

        $queryProduitRapport1 = $db->prepare("SELECT * FROM produits JOIN produit_cat ON produits.ID_PRODUIT = produit_cat.ID_PRODUIT WHERE ID_CAT = (SELECT ID_CAT FROM produit_cat WHERE ID_PRODUIT = ?)");
        $queryProduitRapport1->execute([$_GET['id']]);
    
    
        $produits = $queryProduit->fetchAll(PDO::FETCH_ASSOC);
        $produitsRapport1 = $queryProduitRapport1->fetchAll(PDO::FETCH_ASSOC);

    }else  {
        throw new Exception("Unknown id_product", $_GET['id']);
    }



?>

