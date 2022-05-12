<?php
    include_once('../ptut_db_connexion.php');

        $requeteCat = "SELECT * FROM categorie";

        try {
            $queryCat = $db->query($requeteCat);
            $resultCat = $queryCat->fetchAll(PDO::FETCH_ASSOC);
            if(isset($_POST['categorie']) && $_POST['categorie'] != 0){
                $requeteSousCat = "SELECT sous_categorie.id_sous_cat,nom_sous_cat FROM specification_categorie JOIN sous_categorie ON specification_categorie.id_sous_cat = sous_categorie.id_sous_cat WHERE id_cat = '".$_POST['categorie']."' ";
                $querySousCat = $db->query($requeteSousCat);
                $resultSousCat = $querySousCat->fetchAll(PDO::FETCH_ASSOC);

                $requeteArticle = "SELECT * FROM produit WHERE  id_sous_cat ='".$_POST['sous_categorie']."' ";
                $queryArticle = $db->query($requeteArticle);
                $resultArticle = $queryArticle->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }