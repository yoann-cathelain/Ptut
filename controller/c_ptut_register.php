    <?php
        require_once('../ptut_db_connexion.php');
        include_once('../models/m_ptut_register.php');

        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $countUsername = count($resultUsername);
            $countPassword = count($resultPassword);
            $countEmail = count($resultEmail);

            if($countUsername == 0 && $countPassword == 0 && $countEmail == 0) { 
                $register = "INSERT INTO clients (NOM,MOT_DE_PASSE,EMAIL) VALUES (?,?,?) ";
                $queryRegister = $db->prepare($register);
                $queryRegister->execute(array($username,$password,$email));
                header("Location: ../views/v_ptut_user_register.php?valider=1");
            }else {
                header("Location: ../views/v_ptut_user_register.php?erreur=1");
            }
            
        }else {
            header("Location: ../views/v_ptut_user_register.php?erreur=2");
        }
    ?>
