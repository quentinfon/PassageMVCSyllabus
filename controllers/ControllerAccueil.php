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

        if (Router::$_utilisateur->estAdmin()){

            $this->_view = new View('Gestion');
            $this->_view->generate(array());

        }else{
            $this->_view = new View('Accueil');
            $this->_view->generate(array());
        }


    }

}
