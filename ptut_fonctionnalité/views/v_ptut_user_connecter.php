<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../assets/css/style_projet.css" media="screen" type="text/css">

    </head>
    <body>
        <?php
            
            include_once('../views/v_ptut_navbar.php');
            if($_SESSION['username'] !== ""){
                $user = $_SESSION['username'];
                echo "Bonjour $user, vous êtes connecté";
            }
        ?>
    </body>
</html>