<?php
    try {
    $db = new PDO('mysql:host=localhost;dbname=ptut_test','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        if(TEST){
            die('Erreur: ' .$e->getMessage());
        }
        $erreur = 'connexion';
    }

?>


