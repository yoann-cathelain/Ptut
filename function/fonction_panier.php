<?php
    
    function creationPanier($id_client,$pdodb) {
        $verifPanier = $pdodb->prepare("SELECT COUNT(*) as client FROM panier WHERE ID_CLIENT = ?");
        $verifPanier->execute([$id_client]);

        $verif = $verifPanier->fetchAll(PDO::FETCH_ASSOC);
        $exist = count($verif);
        if($exist == 0){
            $insertPanier = $pdodb->prepare("INSERT INTO panier (ID_CLIENT) VALUES (?)");
            $insertPanier->execute([$id_client]);
        }else {}

    }
    function ajoutArticle($pdodb,$id_panier,$id_produit,$quantite_produit){
        $queryCount = $pdodb->prepare("SELECT COUNT(*) as verif FROM ligne_panier WHERE ID_PRODUIT = ? AND ID_PANIER = ?");
        $queryCount->execute([$id_produit,$id_panier]);

        $exist = $queryCount->fetchAll(PDO::FETCH_ASSOC);
        echo $exist[0]['verif'];
        if($exist[0]['verif'] != 0) {
            modifierQuantite($pdodb,"ajout",$id_produit);
        }else {
            $insertArticle = $pdodb->prepare("INSERT INTO ligne_panier (ID_PANIER,ID_PRODUIT,QUANTITE_PRODUIT) VALUES (?,?,?)");
            $insertArticle->execute([$id_panier,$id_produit,$quantite_produit]);
        }
    }

    function compterArticle($pdodb,$id_panier) {
        $queryCount  = $pdodb->prepare("SELECT SUM(QUANTITE_PRODUIT) as nbArticle FROM ligne_panier WHERE ID_PANIER = ?");
        $queryCount->execute([$id_panier]);

        $nbArticle = $queryCount->fetchAll(PDO::FETCH_ASSOC);
        if($nbArticle[0]['nbArticle'] > 0){
            return $nbArticle[0]['nbArticle'];
        }else{
            return 0;
        }

    }

    function supprimerArticle($pdodb,$id_produit) {
        $queryCount = $pdodb->prepare("SELECT COUNT(*) as verif FROM ligne_panier WHERE ID_PRODUIT = ?");
        $queryCount->execute([$id_produit]);

        $exist = $queryCount->fetchAll(PDO::FETCH_ASSOC);
        if($exist[0]['verif'] > 1) {
            modifierQuantite($pdodb,"supprimer",$id_produit);
        }else {
            $queryDelete = $pdodb->prepare("DELETE FROM ligne_panier WHERE  ID_PRODUIT = ?");
            $queryDelete->execute([$id_produit]);
        }
    }

    function MontantGlobal($pdodb,$id_panier) {
        $promo = "SELECT produits.ID_PRODUIT,PRIX,EN_PROMOTION,PRIX_REDUIT,QUANTITE_PRODUIT FROM ligne_panier JOIN produits ON ligne_panier.ID_PRODUIT = produits.ID_PRODUIT WHERE ID_PANIER = ?";
        $queryPromo = $pdodb->prepare($promo);
        $queryPromo->execute([$id_panier]);
        $resultPromo = $queryPromo->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultPromo as $result){
            if(isset($result['EN_PROMOTION'])){
                if($result['EN_PROMOTION'] != 0){
                    $queryReduc = $pdodb->prepare("SELECT SUM(PRIX_REDUIT*QUANTITE_PRODUIT) as MontantTotReduit FROM ($promo) as result WHERE EN_PROMOTION = ?");
                    $queryReduc->execute([$id_panier,$result['EN_PROMOTION']]);
                    $reduction = $queryReduc->fetchAll(PDO::FETCH_ASSOC);
                    $montantTotReduit = $reduction[0]['MontantTotReduit'];
                }else if($result['EN_PROMOTION'] == 0){
                    $queryNonReduc = $pdodb->prepare("SELECT SUM(PRIX*QUANTITE_PRODUIT) as MontantTotNonReduc FROM ($promo) as result WHERE EN_PROMOTION = ?");
                    $queryNonReduc->execute([$id_panier,$result['EN_PROMOTION']]);
                    $nonReduction = $queryNonReduc->fetchAll(PDO::FETCH_ASSOC);
    
                    $montantTotNonReduit = $nonReduction[0]['MontantTotNonReduc'];
                }
            }

        }
        if(isset($montantTotNonReduit) && isset($montantTotReduit)){
            $total = $montantTotReduit + $montantTotNonReduit;
        }else if(isset($montantTotNonReduit)){
            $total = $montantTotNonReduit;
        }else if(isset($montantTotReduit)){
            $total = $montantTotReduit;
        }else {
            $total = 0;
        }
        return $total;

    }
    function modifierQuantite($pdodb,$action,$id_produit) {
        $quantiteProduit = $pdodb->prepare("SELECT QUANTITE_PRODUIT FROM ligne_panier WHERE ID_PRODUIT = ?");
        $quantiteProduit->execute([$id_produit]);

        $quantity = $quantiteProduit->fetchAll(PDO::FETCH_ASSOC);
        if(isset($quantity[0]['QUANTITE_PRODUIT']) && $action){
            if($action = "ajout"){
                $plusquantity= $quantity[0]['QUANTITE_PRODUIT'] + 1;
                $ajoutQuantite = $pdodb->prepare("UPDATE ligne_panier SET QUANTITE_PRODUIT = ? WHERE ID_PRODUIT = ? ");
                $ajoutQuantite->execute([$plusquantity,$id_produit]);
                return true;
            }else if($action = "supprimer"){
                $moinsquantity= $quantity[0]['QUANTITE_PRODUIT'] - 1;
                $ajoutQuantite = $pdodb->prepare("UPDATE ligne_panier SET QUANTITE_PRODUIT = ? WHERE ID_PRODUIT = ? ");
                $ajoutQuantite->execute([$moinsquantity,$id_produit]);
                return true;
            }else {
                return false;
            }   
        }
        }