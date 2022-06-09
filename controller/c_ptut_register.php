    <?php
        require_once('../ptut_db_connexion.php');
        include_once('../models/m_ptut_register.php');

        if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email'])){
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $email = $_POST['email'];

            if($password == $confirm_password) { 
                try{
                $register = "INSERT INTO clients (PRENOM,NOM,MOT_DE_PASSE,EMAIL) VALUES (?,?,?,?) ";
                $queryRegister = $db->prepare($register);
                $queryRegister->execute(array($prenom,$nom,$password,$email));
                header("Location: ../view/v_ptut_inscription.php?valider=1");
                }catch(PDOException $e){
                    if($e->getCode() == 23000){
                        header("Location: ../view/v_ptut_inscription.php?erreur=1");
                    }else {
                        throw $e;
                    }
                }
            }
            
        }else {
            header("Location: ../view/v_ptut_inscription.php?erreur=2");
        }
    ?>