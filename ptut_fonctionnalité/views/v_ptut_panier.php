<?php
    include_once('../views/v_ptut_navbar.php');
    include_once('../function/fonction_panier.php');
    include_once('../controller/c_ptut_panier.php');

?>
<!DOCTYPE HTML>
<html lang="Fr-fr">
    <head>
        <title>Votre panier</title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['username']) && $_SESSION['username'] == ''){
                header('Location: ../views/v_ptut_user_connexion.php');
            }else {
                ?>
                <form method="POST" action="v_ptut_panier.php">
                <table style="width: 400px">
                    <tr>
                        <td>Votre Panier</td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td>Quantité</td>
                        <td>Prix Unitaire</td>
                        <td>Supprimer</td>
                        <td>Ajouter</td>
                    </tr>
                    <?php
                        if(creationPanier()){
                            $nbArticles = count($_SESSION['panier']['libelleProduit']);
                            if($nbArticles <= 0){
                                ?>
                                <tr><td>Votre panier est vide</td></tr>
                                <?php
                            }else {
                                for($i = 0 ; $i < $nbArticles; $i++){
                                    ?>
                                    <tr>
                                        <td><?=$_SESSION['panier']['libelleProduit'][$i]?></td>
                                        <td><input type="text" value="<?=$_SESSION['panier']['qteProduit'][$i]?>"></td>
                                        <td><?=$_SESSION['panier']['prixProduit'][$i]?></td>
                                        <td><a href="../views/v_ptut_panier.php?action=suppression&nom=<?=$_SESSION['panier']['libelleProduit'][$i]?>">Supprimer</a></td>
                                        <td><a href="../views/v_ptut_panier.php?action=ajout&nom=<?=$_SESSION['panier']['libelleProduit'][$i]?>">Ajouter</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr>
                                    <td>Montant Global</td>
                                    <td>Total : <?=montantGlobal()?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                </table>
                <input type="submit" value="Valider la commande">
            </form>
            <?php
            }
            ?>
    </body>
</html>