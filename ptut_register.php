    <?php
        include_once('ptut_db_connexion.php');

        session_start();
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){

            $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
            $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
            $email = mysqli_real_escape_string($db,htmlspecialchars($_POST['email']));

            if($username != '' && $password !='' && $email !='') {
                $requete = "SELECT count(*) FROM user WHERE username = '".$username."' AND password ='".$password."' AND email = '".$email."' ";
                $exec_requete = mysqli_query($db,$requete);
                $reponse = mysqli_fetch_array($exec_requete);
                $count = $reponse['count(*)'];

                if($count == 0) {
                    $requete_insert = "INSERT INTO user (username,password,email)  VALUES ('".$username."','".$password."','".$email."') ";
                    $exec_requete_insert = mysqli_query($db,$requete_insert);
                    header("Location: views/v_ptut_user_register.php?valider=1");
                }else {
                    header("Location: views/v_ptut_user_register.php?erreur=1");
                }
            }else {
                header("Location: views/v_ptut_user_register.php?erreur=2");
            }
            
        }else {
            header("Location: views/v_ptut_user_register.php");
        }
        mysqli_close($db);
    ?>
