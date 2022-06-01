<?php
    include_once('../models/m_ptut_panier.php');

    if(isset($_GET['id'])){
        ajouterUnArticle($results[0]['NOM_PRODUIT'],count($results),$results[0]['PRIX']);
    }
    $action = empty($_GET['action']) ? 'suppression' : $_GET['action'];

    if($action == 'suppression') {
        if($_SESSION['panier'] && isset($_GET['nom'])){
            supprimerArticle($_GET['nom']);
        }
    }else if($action == 'ajout'){
        if($_SESSION['panier'] && isset($_GET['nom'])){
            $queryAjout = $db->prepare("SELECT * FROM produits WHERE NOM_PRODUIT = ?");
            $queryAjout->execute([$_GET['nom']]);

            $ajout = $queryAjout->fetchAll(PDO::FETCH_ASSOC);

            ajouterUnArticle($ajout[0]['NOM_PRODUIT'],count($ajout),$ajout[0]['PRIX']);
        }
    }

    