<?php
require_once('views/View.php');

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
            $this->accueil();
        }
    }

    private function accueil(){

        require_once('models/UtilisateurManager.php');
        $this->_utilisateurManager = new UtilisateurManager();

        $utilisateurs = $this->_utilisateurManager->getAll();

        $this->_view = new View('Accueil');
        $this->_view->generate(array('utilisateurs' => $utilisateurs));

    }

}
