<?php


class ControllerConnexion
{

    private $_utilisateurManager;
    private $_view;

    public function __construct($url){

        if (isset($url) && count($url)>2){
            throw new Exception('Page introuvable');
        }elseif ( count($url)==2){

        }
        else
        {
            $this->connexion();
        }
    }

    private function connexion(){

        require_once('models/UtilisateurManager.php');
        $this->_utilisateurManager = new UtilisateurManager();

        $this->_view = new View('Connexion');
        $this->_view->generate(array());

    }

}