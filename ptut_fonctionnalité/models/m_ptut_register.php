<?php
    include_once('ptut_db_connexion.php');

    try {
        $requeteUsername = "SELECT * FROM clients WHERE NOM ='".$username."' ";
        $requetePassword = "SELECT * FROM clients WHERE MOT_DE_PASSE ='".$password."' ";
        $requeteEmail = "SELECT * FROM clients WHERE EMAIL ='".$email."' ";

        $queryUsername = $db->query($requeteUsername);
        $queryPassword = $db->query($requetePassword);
        $queryEmail = $db->query($requeteEmail);

        $resultUsername = $queryUsername->fetchall(PDO::FETCH_ASSOC);
        $resultPassword = $queryPassword->fetchall(PDO::FETCH_ASSOC);
        $resultEmail = $queryEmail->fetchall(PDO::FETCH_ASSOC);
        
    }catch(PDOException $e){
        if(TEST){
            die('Erreur'.$e->getMessage());
        }
        $erreur = 'query';
    }