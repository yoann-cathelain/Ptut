<?php
    include_once('../views/v_ptut_navbar.php');
    include_once('../controller/c_ptut_catalogue.php');
?>
<!DOCTYPE html>
    <html lang="fr">
        <body>
        <?php if(isset($resultCat)){

            ?>
            <form action="v_ptut_user_catalogue.php" method="POST">
                <select name="categorie" id ="selectCat">
                    <option value="">Toutes les catégories</option>
                    <?php
                        foreach($resultCat as $cat) {
                                ?>
                                    <option value="<?=$cat['ID_CAT']?>"><?=$cat['NOM_CAT']?></option>
                                <?php
                            }

                    ?>
            <?php
        }
        ?>    
                </select>
                <select name="sous_categorie" id="selectSousCat" >
                    <option value="0">Toutes les sous catégories</option>
                    <?php
                        foreach($resultSousCat as $sousCat) {
                            if(isset($_GET['categorie']) && $_GET['sous_categorie'] == $sousCat["ID_SOUSCAT"]){
                                ?>
                                <option value="<?=$sousCat['ID_SOUSCAT']?>" selected="true"><?=$sousCat['NOM_SOUSCAT']?></option>
                                <?php
                            }else {
                                ?>
                                <option value="<?=$sousCat['ID_SOUSCAT']?>"><?=$sousCat['NOM_SOUSCAT']?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
                <input type="submit" id="idCat" name="submit" value="Appliquer la catégorie">
            </form>
            <table align="center" border="1px" style="width: 600px; line-height:40px;">
                <tr>
                    <th colspan="4"><h2>Ensemble des Produits</h2></th>
                </tr>
                <t>
                        <th>ID</th>
                        <th>NOM PRODUIT</th>
                        <th>DISPONIBLE</th>
                        <th>STOCK</th>

                    <?php foreach($resultArticle as $Article){
                        ?>
                        <tr>
                            <td><?=$Article['ID_PRODUIT']?></td>
                            <td><?=$Article['NOM_PRODUIT']?></td>
                            <td><?=$Article['DESCRIPTION']?></td>
                            <td><?=$Article['PRIX']?></td>
                            <td><?=$Article['PROMO']?></td> 
                            <td><?=$Article['STOCK']?></td> 
                        </tr>

                        <?php
                    }
                    ?>
            </t>
            </table>
        </body>
    </html>
