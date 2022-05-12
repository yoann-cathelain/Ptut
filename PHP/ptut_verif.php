<?php

    include_once('ptut_db_connexion.php');

    session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        

        $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

        if($username !=='' && $password !==''){
            $requete = "SELECT count(*) FROM user WHERE username = '".$username."' AND password = '".$password."' ";
            $exec_requete = mysqli_query($db,$requete);
            $reponse = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];

            if($count == 1) {
                $_SESSION['username'] = $username;
                header('Location: ptut_user_connecter.php');
            }else {
                header('Location: ptut_user_connexion.php?erreur=1');
            }
        }else {
            header('Location: ptut_user_connexion.php?erreur=2');
            
        }

    }else {
        header('Location: ptut_user_connexion.php');
    }
    mysqli_close($db);
?>