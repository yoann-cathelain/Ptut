<?php
    include_once('../ptut_db_connexion.php');

        $requeteCat = "SELECT * FROM categories";

        try {
            $queryCat = $db->query($requeteCat);
            $resultCat = $queryCat->fetchAll(PDO::FETCH_ASSOC);
            if(isset($_POST['categorie']) && $_POST['categorie'] != 0){
                $requeteSousCat = "SELECT sous_categories.ID_SOUSCAT,NOM_SOUSCAT FROM cat_souscat JOIN sous_categories ON cat_souscat.ID_SOUSCAT = sous_categories.ID_SOUSCAT WHERE ID_CAT = '".$_POST['categorie']."' ";
                $querySousCat = $db->query($requeteSousCat);
                $resultSousCat = $querySousCat->fetchAll(PDO::FETCH_ASSOC);

                $requeteArticle = "SELECT * FROM produit_cat JOIN produits ON produit_cat.ID_PRODUIT = produits.ID_PRODUIT WHERE  ID_SOUSCAT ='".$_POST['sous_categorie']."' ";
                $queryArticle = $db->query($requeteArticle);
                $resultArticle = $queryArticle->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }