
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Aeki</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/aeki_favicon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
</head>
<body>
    <?php
    include_once('../controller/c_ptut_catalogue.php');
    include('../view/v_ptut_navbar.php');
    $user = $_SESSION['username'];
    ?>
    


    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-9">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-flex">
                                <select class="form-control linked-select" name="categorie" id="Cat" data-target="#sousCat" data-source="../api/list.php?type=souscategories&filtre=$id">
                                    <option value="">Séléctionnez une catégorie</option>
                                    <?php
                                    foreach($categories as $categorie){
                                    ?>
                                    <option value="<?=$categorie['ID_CAT']?>"><?=$categorie['NOM_CAT']?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 pb-4">
                            <div class="d-flex">
                                <select class="form-control" name="sous_categorie" id="sousCat" style="display:none">
                                    <option value="">Selectionnez une sous catégorie</option>
                                </select>
                            </div>
                        </div>
                        <script src="../assets/js/s_catalogue.js"></script>
                        <div class="col-md-3 pb-4">
                            <div class="d-flex">
                                <input type="checkbox" name="EnPromotion" value="1">
                                <label class ="promotion">En promotion</label>
                                </div>
                        </div>
                        <div class="col-md-3 pb-4">
                            <div class="d-flex">
                                <input type="submit" class="btn btn-success"value="Valider">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <?php

                        if(!empty($resultArticle)){
                            foreach($resultArticle as $Article) {
                                ?>
                                    <div class="col-md-4">
                                        <div class="card mb-4 product-wap rounded-0">
                                            <div class="card rounded-0">
                                                <img class="card-img rounded-0 img-fluid" src="<?=$Article['IMG']?>">
                                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                                    <ul class="list-unstyled">
                                                        <li><a class="btn btn-success text-white mt-2" href="../view/v_ptut_produits.php?id=<?=$Article['ID_PRODUIT']?>"><i class="far fa-eye"></i></a></li>
                                                        <li><a class="btn btn-success text-white mt-2" href="../view/v_ptut_panier.php?id_produit=<?=$Article['ID_PRODUIT']?>&user=<?=$user?>"><i class="fas fa-cart-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <a href="../view/v_ptut_produits.php?id=<?=$Article['ID_PRODUIT']?>" class="h3 text-decoration-none"><?=$Article['NOM_PRODUIT']?></a>
                                                <?php
                                                    if($Article['EN_PROMOTION'] == 1){
                                                        ?>
                                                        <p class="text-center mb-0"><?=$Article['PRIX_REDUIT']?>€</p>
                                                        <?php
                                                    }else {
                                                        ?>
                                                        <p class="text-center mb-0"><?=$Article['PRIX']?>€</p>
                                                        <?php
                                                    }
                                                    ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                        }else{
                            ?>
                            <h1>Aucun résultat trouvé</h1>
                            <?php
                        }
                    ?>
                </div>    
            </div>
        </div>
    </div>
    <!-- End Content -->
    <?php
        include_once('../view/v_ptut_brand.php');
        include_once('../view/v_ptut_footer.php');
    ?>

    
    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>