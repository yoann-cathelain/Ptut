<?php
    include_once('ptut_db_connexion.php');

    if(isset($erreur) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
    }
    try {
        $requeteUsername = "SELECT * FROM user WHERE username ='".$username."' ";
        $requetePassword = "SELECT * FROM user WHERE password ='".$password."' ";
        $requeteEmail = "SELECT * FROM user WHERE email ='".$email."' ";

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