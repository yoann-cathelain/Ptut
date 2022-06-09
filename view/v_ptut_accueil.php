<body>
        <?php   
            include_once('v_ptut_navbar.php');
            include __DIR__ .'/../controller/c_ptut_accueil.php';
        ?>
<!-- Start Banner Hero-->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-banner" src="<?=$firstTrend[0]['IMG']?>" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Aeki</b></h1>
                                <h3 class="h2">Tout type de meuble à votre disposition</h3>
                                <p>
                                    Aeki vous offre une expérience client inoubiable ainsi qu'un service clientel à la hauteur de vos éxigences.
                                    Accédez à la galerie de <a class="text-success" href="../view/v_ptut_catalogue.php" target="_blank">meuble</a> de notre site. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="https://www.ikea.com/fr/fr/images/products/janinge-chaise-jaune__0719973_pe732347_s5.jpg?f=s" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Un designer cuisine Online</h1>
                                <h3 class="h2">Innové est notre priorité</h3>
                                <p>
                                    Utilisez notre concepteur pour vos cuisines, avec un modèle 3D ainsi qu'un vue à plusieurs angle.
                                    Nous mettons également des <strong>logiciels de conception</strong> à votre disposition.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?=$trend[0]['IMG']?>" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Consultez la disponibilité</h1>
                                <h3 class="h2">Stock de nos magasins</h3>
                                <p>
                                    Consultez la mise en stock de chaque produits de vos recherches. 
                                    Contactez le support pour plus d'information concernant les livraisons.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


        <!-- Start Categories of The Month -->
        <section class="container py-5">
            <div class="row text-center pt-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Catégories du mois</h1>
                </div>
            </div>
            <div class="row">
                <?php
                foreach($catMonth as $month){
                    ?>
                    <div class="col-12 col-md-4 p-5 mt-3">
                    <a href="#"><img src="<?=$month['IMG']?>" class="rounded-circle img-fluid border"></a>
                    <h5 class="text-center mt-3 mb-3"><?=$month['NOM_CAT']?></h5>
                    <p class="text-center"><a href="../view/v_ptut_catalogue.php?categorie=<?=$month['ID_CAT']?>&EnPromotion="class="btn btn-success">Go Shop</a></p>
                </div>
                <?php
                }
                ?>


        </section>
        <!-- End Categories of The Month -->


       
        <?php

            include_once('v_ptut_footer.php');
        ?>

    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->