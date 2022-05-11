<!DOCTYPE html>
    
    <html lang ="fr">
        <head>
            <meta charset = "utf-8">
            <link rel ="stylesheet" href="../assets/css/style_projet.css"/>
        </head>
        <?php
                include_once('../views/v_ptut_navbar.php');
            ?>
        <body>
            <div id ="form_register_connec">
                <form action="../ptut_register.php"  method="POST">
                    <h1>Inscription</h1>

                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="Entrez le nom d'utilisateur" name ="username" required>

                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrez le mot de passe" name ="password" required>

                    <label><b>E-mail</b></label>
                    <input type="email"  placeholder="Entrez l'e-mail" name ="email" required>

                    <input type="submit" id='submit' value="S'inscrire">
                    <a href="../views/v_ptut_user_connexion.php">Déjà inscrit ? Connectez vous !</a>
                    
                    <?php
                        if(isset($_GET['valider'])){
                            $val = $_GET['valider'];
                            if($val == 1){
                                echo "<p> Votre compte a été créé avec succès </p>";
                            }
                        }
                        if(isset($_GET['erreur'])) {
                            $err = $_GET['erreur'];
                            if($err == 1){
                                echo "<p> Nom d'utilisateur ou mot de passe ou email déjà utilisé</p>";
                            }else if($err == 2){
                                echo "<p> Nom d'utilisateur ou mot de passe ou email incorrect</p>";
                            }
                        }
                    ?>
                </form>
            </div>
        </body>
    </html>