<?php
    include_once('../views/v_ptut_navbar.php');
?>

<!DOCTYPE html>
    <html lang="fr">
        <body>
            <form action="#" method="GET">
                <select name="categorie">
                    <option value="0">Toutes les catégories</option>
                    <?php
                        foreach($resultCat as $cat) {
                            if(isset($_GET['categorie']) && $_GET['categorie'] == $cat["id_cat"]){
                                ?>
                                <option value="<?=$cat['id_cat']?>" selected="true"><?$cat['nom_cat']?></option>
                                <?php
                            }else {
                                ?>
                                <option value="<?=$cat['id_cat']?>"><?=$cat['nom_cat']?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
                <select name="sous_categorie">
                    <option value="0">Toutes les sous catégories</option>
                    <?php
                        foreach($resultSousCat as $sousCat) {
                            if(isset($_GET['categorie']) && $_GET['sous_categorie'] == $sousCat["id_sous_cat"]){
                                ?>
                                <option value="<?=$sousCat['id_sous_cat']?>" selected="true"><?$sousCat['nom_sous_cat']?></option>
                                <?php
                            }else {
                                ?>
                                <option value="<?=$sousCat['id_sous_cat']?>"><?=$sousCat['nom_sous_cat']?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
            </form>
        </body>
    </html>
