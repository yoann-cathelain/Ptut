<?php
    include_once('../ptut_db_connexion.php');

    if(isset($_POST['email']) && isset($_POST['password'])){
        $password = $_POST['password'];
        $email = $_POST['email'];
        try {
            $requeteConnection = $db->prepare("SELECT * FROM clients WHERE EMAIL = ? AND MOT_DE_PASSE = ?");
            $requeteConnection->execute([$email,$password]);
            $resultConnection = $requeteConnection->fetchall(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
                echo 'Erreur'.$e->getMessage();
        }
    }
?>