<?php

    //Constante DEV/PRODUCTION
    const TEST = true; // true si en dev, false si en production

    //Connexion base de donnée
    const BD_HOST = 'localhost';
    const BD_NAME = 'ptut';
    const BD_USER = 'root';
    const BD_PWD = '';

    //Langue du site
    const LANG = "FR-fr";

    //Dossier racine du site
    define('PATH_CONTROLLER','./controller/c_');
    define('PATH_VIEW','./view/v_');
    define('PATH_ASSETS','./assets/');
    define('PATH_MODELS','./models/m_');

    //Sous dossier du site
    define('PATH_CSS',PATH_ASSETS.'css');
    define('PATH_IMAGES',PATH_ASSETS.'images');
?>