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

        $utilisateurs = $this->_utilisateurManager->getAllUtilisateurs();

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

        $this->_view = new View('ModifierUtilisateur');

        $this->_utilisateurManager = new UtilisateurManager();

        $utilisateur = $this->_utilisateurManager->getUti($id);

        $promos = EnseignementsManager::getPromos();

        $this->_view->generate(array('utilisateur' => $utilisateur, 'promos' => $promos));

    }

    private function enregistrementUtilisateur($id){

        $uti = UtilisateurManager::getUti($id);

        if (isset($_POST['nom_utilisateur'])){
            $uti->setUti_nom($_POST['nom_utilisateur']);
        }if (isset($_POST['prenom_utilisateur'])){
            $uti->setUti_prenom($_POST['prenom_utilisateur']);
        }if (isset($_POST['mail'])){
            $mail = preg_replace("#( )+#", "", $_POST['mail']);
            $uti->setUti_mail($mail);
        }if (isset($_POST['telephone'])){
            $uti->setEns_tel($_POST['telephone']);
        }if (isset($_POST['pro_code'])){
            $uti->setPro_code($_POST['pro_code']);
        }if (isset($_POST['role'])){
            foreach ($_POST['role'] as $role){
                if ($role == "enseignant"){
                    $uti->devientEns();
                }if ($role == "eleve"){
                    $uti->devientEtu();
                }if ($role == "admin"){
                    $uti->devientAdmin();
                }
            }
        }

        UtilisateurManager::miseAJour($uti);

        header('location: /utilisateurs');
        exit();

    }

}
