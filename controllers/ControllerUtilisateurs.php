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
        }
        else if(isset($url[1], $_POST['uti_num'], $_POST['modifier']) && $url[1] == "consulter"){

            $this->enregistrementUtilisateur($_POST['uti_num']);

        }
        else if(isset($url[1], $_POST['uti_num']) && $url[1] == "consulter"){
            $this->consultationUtilisateur($_POST['uti_num']);
        }
        else if(isset($url[1], $_POST['uti_num']) && $url[1] == "modifier"){
            $this->modificationUtilisateur($_POST['uti_num']);
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

    private function modificationUtilisateur($id){

        var_dump($_POST);

        $this->_view = new View('ModifierUtilisateur');

        $this->_utilisateurManager = new UtilisateurManager();

        $utilisateur = $this->_utilisateurManager->getUti($id);

        $promos = EnseignementsManager::getPromos();

        $this->_view->generate(array('utilisateur' => $utilisateur, 'promos' => $promos));

    }

    private function enregistrementUtilisateur($id){


    }

}
