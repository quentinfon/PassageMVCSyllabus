<?php
require_once('views/View.php');
require_once('models/UtilisateurManager.php');

class ControllerUtilisateurs
{

    private $_utilisateurManager;
    private $_view;

    public function __construct($url)
    {

        if (isset($url) && count($url) > 4) {
            throw new Exception('Page introuvable');
        }else if(isset($url[1], $_POST['uti_num']) && $url[1] == "consulter"){
            $this->consultationUtilisateur($_POST['uti_num']);
        }
        else{
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

    private function consultationUtilisateur($id){

        $this->_view = new View('AffichageUtilisateur');

        $this->_utilisateurManager = new UtilisateurManager();

        $utilisateur = $this->_utilisateurManager->getUti($id);
        $sylEns = array();

        if (UtilisateurManager::estEnseignant($id)){
            $sylEns = SyllabusManager::getSylEnsCreateur($utilisateur->getEnsNum());
        }

        $this->_view->generate(array('utilisateur' => $utilisateur, 'sylEns' => $sylEns));

    }

}
