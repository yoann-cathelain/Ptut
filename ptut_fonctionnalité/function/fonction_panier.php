<?php
    function creationPanier() {
        if(!(isset($_SESSION['panier']))){
            $_SESSION['panier'] = array();
            $_SESSION['panier']['libelleProduit'] = array();
            $_SESSION['panier']['qteProduit'] = array();
            $_SESSION['panier']['prixProduit'] = array();
            $_SESSION['panier']['verouiller'] = false;
        }
        return true;
    }

    function supprimerPanier(){
        unset($_SESSION['panier']);
    }

    function compterArticle() {
        if(isset($_SESSION['panier'])) {
            return count($_SESSION['panier']['libelleProduit']);
        }else {
            return 0;
        }
    }

    function isVerouiller() {
        if(isset($_SESSION['panier']) && isset($_SESSION['panier']['verouiller']) == false) {
            return true;
        }else {
            return false;
        }
    }

    function ajouterUnArticle($libelleProduit,$qteProduit,$prixProduit) {
        if(creationPanier() && !isVerouiller()){
            $positionProduit = array_search($libelleProduit,$_SESSION['panier']['libelleProduit']);

            if($positionProduit !== false){
                $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit;
            }else {
                array_push($_SESSION['panier']['libelleProduit'],$libelleProduit);
                array_push($_SESSION['panier']['qteProduit'],$qteProduit);
                array_push($_SESSION['panier']['prixProduit'],$prixProduit);
            }
        }else {
            echo "un problème est survenu";
        }
    }

    function supprimerArticle($libelleProduit){
        if(creationPanier() && !isVerouiller()){
            $tmp = array();
            $tmp['libelleProduit']= array();
            $tmp['qteProduit'] = array();
            $tmp['prixProduit'] = array();
            $tmp['verouiller'] = $_SESSION['panier']['verouiller'];

            for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++) {
                if($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit){
                    array_push($tmp['panier']['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
                    array_push($tmp['panier']['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
                    array_push($tmp['panier']['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
                }
            }
            $_SESSION['panier'] = $tmp;
            unset($tmp);
        }else {
            echo "un probleme est survenu";
        }
    }

    function modifierQteArticle($libelleProduit,$qteProduit){
        if(creationPanier() && !isVerouiller()){
            if($qteProduit > 0){
                $positionProduit = array_search($libelleProduit,$_SESSION['panier']['libelleProduit']);
                if($positionProduit !== false){
                    $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit;
                }
            }else {
                supprimerArticle($libelleProduit);
            }
        }else {
            echo "un probleme est survenu";
        }
    }

    function montantGlobal() {
        $total = 0;
        for($i = 0; $i < count($_SESSION['panier']['libelleProduit']);$i++){
            $total += $_SESSION['panier']['qteProduit'][$i]*$_SESSION['panier']['prixProduit'][$i];
        }
        return $total;
    }