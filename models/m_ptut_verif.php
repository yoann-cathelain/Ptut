<?php
    include_once('ptut_db_connexion.php');

    if(!isset($erreur) && isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
        try {
            $requeteConnection = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'  ";
            
            $queryConnection = $db->query($requeteConnection);;

            $resultConnection = $queryConnection->fetchall(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            if(TEST){
                die('Erreur'.$e->getMessage());
                $erreur = 'query';
            }
        }
?>