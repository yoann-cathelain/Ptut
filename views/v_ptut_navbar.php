<!DOCTYPE html>
<html lang="fr">
    <meta charset="utf-8">
    <link rel ="stylesheet" href="../assets/css/style_projet.css"/>
    <link rel="icon" href="../ressources/aeki_logo.ico">
    <body>
    <header>
        <div class = "menu">
            <nav>
                <a href="../views/v_ptut_accueil.php"><h1>AEKI</h1></a>
            <nav>
                <a href="v_ptut_user_catalogue.php">Produits</a>
                <a href="#">A propos</a>
                
            </nav>
            <nav>
                <input type="text" placeholder="Recherchez un produit...">
            </nav>
            <nav>
                
                <a href="#">Panier</a>
                <a href="#">Compte</a>
                <?php 
                    session_start();
                    if($_SESSION['username'] ==""){
                        $user = $_SESSION['username'];
                        $url_connexion = "../views/v_ptut_user_connexion.php";
                        echo "<a href='".$url_connexion."'>Se connecter</a>";
                    }
                    
                    if($_SESSION['username']!=""){
                        $user = $_SESSION['username'];
                        $url_connecter ="#";
                        echo "<a href='".$url_connecter."'>$user</a>";
                        ?>
                        <a href="../views/v_ptut_user_deconnexion.php">Se déconnecter</a>
                        <?php
                    }
                    ?>
            </nav>
            </nav>
        </div>
    </header>
    </body>
</html>