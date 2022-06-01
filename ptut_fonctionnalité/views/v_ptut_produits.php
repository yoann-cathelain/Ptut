<?php
    include_once('../controller/c_ptut_produits.php');
    include_once('v_ptut_navbar.php');
?>

<!DOCTYPE html>
<html lang="FR-fr">

    <?php
        foreach($produits as $produit){
            if(isset($produit['URL_IMAGE'])){
                ?>
                <img src="<?=$produit['URL_IMAGE']?>">
                <h1><?=$produit['NOM_PRODUIT']?></h1>
                <a class = "btn_commande" href="../views/v_ptut_panier.php?id=<?=$_GET['id']?>">Commander <?=$produit['NOM_PRODUIT']?></a>
                <?php
        }
        }

        ?>


</html>