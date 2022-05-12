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
                                    <option value="<?=$cat['id_cat']?>"><?=$cat['nom_cat']?></option>
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
                            if(isset($_GET['categorie']) && $_GET['sous_categorie'] == $sousCat["id_sous_cat"]){
                                ?>
                                <option value="<?=$sousCat['id_sous_cat']?>" selected="true"><?=$sousCat['nom_sous_cat']?></option>
                                <?php
                            }else {
                                ?>
                                <option value="<?=$sousCat['id_sous_cat']?>"><?=$sousCat['nom_sous_cat']?></option>
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
                            <td><?=$Article['id_prod']?></td>
                            <td><?=$Article['nom_produit']?></td>
                            <td><?=$Article['est_disponible']?></td>
                            <td><?=$Article['stock']?></td>
                        </tr>

                        <?php
                    }
                    ?>
            </t>
            </table>
        </body>
    </html>
