<?php
    include_once('../ptut_db_connexion.php');

    if(isset($_SESSION)){
        session_start();
    }
        try {
            $categories = $db->query("SELECT * FROM categories");
            $souscategories = $db->query("SELECT * FROM sous_categories");

            $queryArticle = $db->query("SELECT * FROM produits");
            if(isset($_GET['EnPromotion']) && $_GET['categorie'] == 0){
                $queryArticle = $db->prepare("SELECT * FROM produits WHERE EN_PROMOTION = ?");
                $queryArticle->execute([$_GET['EnPromotion']]);
            }
            if(isset($_GET['categorie']) && isset($_GET['EnPromotion']) && $_GET['categorie'] != 0){
                $queryArticle = $db->prepare("SELECT * FROM produit_cat JOIN produits ON produit_cat.ID_PRODUIT = produits.ID_PRODUIT WHERE EN_PROMOTION = ? AND ID_CAT = ?");
                $queryArticle->execute([$_GET['EnPromotion'],$_GET['categorie']]);
            }
            if(isset($_GET['categorie']) && $_GET['categorie'] != 0){
                $queryArticle = $db->prepare("SELECT * FROM produit_cat JOIN produits ON produit_cat.ID_PRODUIT = produits.ID_PRODUIT WHERE ID_CAT = ? ");
                $queryArticle->execute([$_GET['categorie']]);

            }if(isset($_GET['categorie']) && isset($_GET['sous_categorie']) && $_GET['sous_categorie'] != 0) {
                $queryArticle = $db->prepare("SELECT * FROM produit_cat JOIN produits ON produit_cat.ID_PRODUIT = produits.ID_PRODUIT WHERE ID_CAT = ? AND ID_SOUSCAT = ?");
                $queryArticle->execute([$_GET['categorie'],$_GET['sous_categorie']]);
            }
            if(isset($_GET['categorie']) && isset($_GET['sous_categorie']) && isset($_GET['EnPromotion']) && $_GET['categorie'] != 0 && $_GET['sous_categorie'] != 0 && $_GET['EnPromotion'] != 0){
                $queryArticle = $db->prepare("SELECT * FROM produit_cat JOIN produits ON produit_cat.ID_PRODUIT = produits.ID_PRODUIT WHERE EN_PROMOTION = ? AND ID_CAT = ? AND ID_SOUSCAT = ?");
                $queryArticle->execute([$_GET['EnPromotion'],$_GET['categorie'],$_GET['sous_categorie']]);
            }
            if(isset($_GET['search'])&& $_GET['search'] != null){
                $queryArticle = $db->prepare("SELECT * FROM produit_cat JOIN produits ON produit_cat.ID_PRODUIT = produits.ID_PRODUIT JOIN categories ON produit_cat.ID_CAT = categories.ID_CAT WHERE NOM_CAT LIKE ?;");
                $queryArticle->execute(['%'. $_GET['search'].'%' ]);
            }

            $resultArticle = $queryArticle->fetchAll(PDO::FETCH_ASSOC);
        
            

        }catch(PDOException $e){
            echo $e->getMessage();
        }