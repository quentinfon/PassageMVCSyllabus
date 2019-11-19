<?php
require_once('views/View.php');
require_once('models/UtilisateurManager.php');

class ControllerUtilisateurs
{

    private $_utilisateurManager;
    private $_view;

    public function __construct($url)
    {

        if (isset($url) && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {
            $this->listeUtilisateurs();
        }
    }

    private function listeUtilisateurs()
    {
        $this->_view = new View('ListeUtilisateur');

        $this->_utilisateurManager = new UtilisateurManager();

        $utilisateurs = $this->_utilisateurManager->getAll();

        $this->_view->generate(array('utilisateurs' => $utilisateurs));

    }

}
