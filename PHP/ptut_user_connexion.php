<!DOCTYPE html>
    
    <html lang ="fr">
        <head>
            <meta charset = "utf-8">
            <link rel ="stylesheet" href="css/style_projet.css"/>
        </head>
        <body>
            <?php
                include_once('ptut_navbar.php');
            ?>
            <div id ="form_register_connec">
                <form action="ptut_verif.php"  method="POST">
                    <h1>Connexion</h1>

                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="Entrez le nom d'utilisateur" name ="username" required>

                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrez le mot de passe" name ="password" required>

                    <input type="submit" id='submit' value="Se connecter">
                    <a href="ptut_user_register.php">Pas inscrit ? Inscrivez-vous !</a>

                    <?php
                        if(isset($_GET['erreur'])) {
                            $err = $_GET['erreur'];
                            if($err == 1 || $err == 2){
                                echo "<p> Utilisateur ou mot de passe incorrect</p>";
                            }
                        }
                    ?>
                </form>
            </div>
        </body>
    </html>