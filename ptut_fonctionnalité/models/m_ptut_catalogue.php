<?php
    include_once('../ptut_db_connexion.php');

        try {

            $categories = $db->query("SELECT * FROM categories");
            $souscategories = $db->query("SELECT * FROM sous_categories");

            $queryArticle = $db->query("SELECT * FROM produits");
            if(isset($_GET['categorie']) && $_GET['categorie'] != 0){
                $queryArticle = $db->query("SELECT * FROM produit_cat JOIN produits ON produit_cat.ID_PRODUIT = produits.ID_PRODUIT WHERE ID_CAT = '".$_GET['categorie']."' ");
            }
            if(isset($_GET['categorie']) && isset($_GET['sous_categorie']) && $_GET['sous_categorie'] != 0) {
                $queryArticle = $db->query("SELECT * FROM produit_cat JOIN produits ON produit_cat.ID_PRODUIT = produits.ID_PRODUIT WHERE ID_CAT = '".$_GET['categorie']."' AND ID_SOUSCAT = '".$_GET['sous_categorie']."'");
            }
            $resultArticle = $queryArticle->fetchAll(PDO::FETCH_ASSOC);
        
            

        }catch(PDOException $e){
            echo $e->getMessage();
        }