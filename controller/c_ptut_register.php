    <?php
        include_once('ptut_db_connexion.php');
        include_once('../models/m_ptut_register.php');

        session_start();
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
            $countUsername = count($resultUsername);
            $countPassword = count($resultPassword);
            $countEmail = count($resultEmail);

            if($countUsername == 0 && $countPassword == 0 && $countEmail == 0) { 
                $register = "INSERT INTO user (username,password,email) VALUES (:username,:password,:email) ";
                $queryRegister = $db->prepare($register);
                $queryRegister->bindParam(':username',$username);
                $queryRegister->bindParam(':password', $password);
                $queryRegister->bindParam(':email',$email);
                $queryRegister->execute();
                header("Location: views/v_ptut_user_register?val=1");
            }else {
                header("Location: views/v_ptut_user_register.php?erreur=1");
            }
            
        }else {
            header("Location: views/v_ptut_user_register.php?erreur=2");
        }
    ?>
