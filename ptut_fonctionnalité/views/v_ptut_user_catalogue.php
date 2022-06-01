<?php
    require_once('../views/v_ptut_navbar.php');
    include_once('../controller/c_ptut_catalogue.php');
?>
<!DOCTYPE html>
    <html lang="fr">
        <body>
            <form action="v_ptut_user_catalogue.php" method="GET">
                <select class = "linked-select "name="categorie" id ="Cat" data-target="#sousCat" data-source="../api/list.php?type=souscategories&filtre=$id">
                    <option value="">Séléctionnez une catégorie</option>
                    <?php
                        foreach($categories as $categorie){
                            ?>
                            <option value="<?=$categorie['ID_CAT']?>"><?=$categorie['NOM_CAT']?></option>
                            <?php
                        }
                        ?>

                </select>
                <select name="sous_categorie" id="sousCat" style="display:none ;" >
                    <option value="0">Séléctionnez une sous catégorie</option>
                </select>
                <script src="../assets/script/s_catalogue.js"></script>
                <input type="submit" id="idCat" name="submit" value="Appliquer la catégorie">
            </form>
            <div class="catalogue_product">
                <?php
                    foreach($resultArticle as $Article) {
                        ?>
                        <div class="product_list_item">
                            <img src="<?=$Article['URL_IMAGE']?>">
                            <h6><a href="../views/v_ptut_produits.php?id=<?=$Article['ID_PRODUIT']?>"><?=$Article['NOM_PRODUIT']?></a></h6>
                            <p><?=$Article['PRIX']?></p>
                        </div>
                        <?php
                    }
                    ?>
            </div>

            
        </body>
    </html>
