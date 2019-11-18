<?php

class ControllerAccueil
{

    private $_utilisateurManager;
    private $_view;

    public function __construct($url){

        if (isset($url) && count($url)>1){
            throw new Exception('Page introuvable');
        }
        else
        {
            self::accueil();
        }
    }

    private function accueil(){



        require_once('models/UtilisateurManager.php');
        $this->_utilisateurManager = new UtilisateurManager();

        $utilisateurs = $this->_utilisateurManager->getAll();

        require_once('views/viewAccueil.php');
    }

}
