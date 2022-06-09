<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Aeki - Panier</title>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<?php
        include '../function/fonction_panier.php';
        include '../controller/c_ptut_panier.php';
        include('../view/v_ptut_navbar.php');
        $user = $_SESSION['username'];
?>
<div class="container">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-9">
            <div class="ibox">
                <div class="ibox-title">
                    <?php
                        if(empty($nbArticles)){
                            ?>
                            <span class="pull-right">(<strong>0</strong>) items</span>
                            <?php
                        }else {
                            ?>
                            <span class="pull-right">(<strong><?=$nbArticles?></strong>) items</span>
                            <?php
                        }
                        ?>
                    <h5>Article dans votre panier</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table shoping-cart-table">
                            <?php
                                if(isset($Articles) && $nbArticles > 0 && isset($_GET['user'])){
                                    foreach($Articles as $Article){
                                        ?>
                                        <tr>
                                        <td>
                                            <img src="<?=$Article['IMG']?>" style="width:120px;">
                                        </td>
                                        <td class="desc">
                                            <h3>
                                            <a href="../view/v_ptut_produits.php?id=<?=$Article['ID_PRODUIT']?>" class="text-navy">
                                                <?=$Article['NOM_PRODUIT']?>
                                            </a>
                                            </h3>
                                            <p class="small"><?=$Article['DESCRIPTION']?></p>
    
                                            <div class="m-t-sm">
                                                <a href="../view/v_ptut_panier.php?id_produit=<?=$Article['ID_PRODUIT']?>&user=<?=$user?>" class="text-muted"><i class="fa fa-gift"></i> Ajouter un produit</a>
                                                |
                                                <a href="../view/v_ptut_panier.php?action=supprimer&id=<?=$Article['ID_PRODUIT']?>&user=<?=$user?>" class="text-muted"><i class="fa fa-trash"></i> Supprimer le produit</a>
                                            </div>
                                        </td>
    
                                        <td>
                                            <?php
                                                if($Article['EN_PROMOTION'] == 1){
                                                    $prixReduit = $Article['PRIX_REDUIT']*$Article['QUANTITE_PRODUIT'];
                                                    $prix = $Article['PRIX']*$Article['QUANTITE_PRODUIT'];
                                                    ?>
                                                    <?=$prixReduit?>€
                                                    <s class="text-muted"><?=$prix?>€</s>
                                                    <?php
                                                }else {
                                                    $prix = $Article['PRIX']*$Article['QUANTITE_PRODUIT'];
                                                    ?>
                                                    <?=$prix?> €
                                                    <?php
                                                }
                                                ?>
                                        </td>
                                        <td width="65">
                                        <input type="text" class="form-control" placeholder="<?=$Article['QUANTITE_PRODUIT']?>">
                                        </td>
                                        <td>
                                            <h4>
                                                <?php
                                                    if($Article['EN_PROMOTION'] == 1){
                                                        $prixReduit = $Article['PRIX_REDUIT']*$Article['QUANTITE_PRODUIT'];
                                                        ?>
                                                        <?=$prixReduit?>€
                                                        <?php
                                                    }else {
                                                        $prix = $Article['PRIX']*$Article['QUANTITE_PRODUIT'];
                                                        ?>
                                                        <?=$prix?>€
                                                        <?php
                                                    }
                                                    ?>
                                            </h4>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }else {
                                    ?>
                                    <tr><td>Votre panier est vide</td></tr>
                                    <?php
                                }
                                ?>
                        </table>
                    </div>

                </div>
               
                <div class="ibox-content">
                    <?php
                        if(empty($_SESSION['username'])){
                            ?>
                            <a href="../view/v_ptut_connexion.php" class="btn btn-primary pull-right"><i class="fa fa fa-shopping-cart"></i> Checkout</a>
                            <?php
                        }else {
                            ?>
                            <a href="../view/v_ptut_connexion.php" class="btn btn-primary pull-right"><i class="fa fa fa-shopping-cart"></i> Checkout</a>
                            <?php
                        }
                        ?>

                    <a href="../view/v_ptut_catalogue.php" class="btn btn-white"><i class="fa fa-arrow-left"></i> Continue shopping</a>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Cart Summary</h5>
                </div>
                <div class="ibox-content">
                    <span>
                        Total
                    </span>
                    <?php
                        if(isset($Articles) && $nbArticles > 0){
                                ?>
                                <h2 class="font-bold"><?=MontantGlobal($db,$Articles[0]['ID_PANIER'])?> €</h2>
                                <?php
                            }else {
                            ?>
                            <h2 class="font-bold">0 €</h2>
                            <?php
                        }
                        ?>
                    <hr>
                    <span class="text-muted small">
                        *For United States, France and Germany applicable sales tax will be applied
                    </span>
                    <div class="m-t-sm">
                        <div class="btn-group">
                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</a>
                        <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->
</body>
</html>