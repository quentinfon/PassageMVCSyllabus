<?php


class ControllerConnexion
{

    private $_utilisateurManager;
    private $_view;

    public function __construct($url){

        require_once('models/UtilisateurManager.php');
        $this->_utilisateurManager = new UtilisateurManager();


        if (isset($url) && count($url)>3){
            throw new Exception('Page introuvable');
        }elseif ( count($url)>2 && $url[1]=='process'){
            $this->process();
        }
        else
        {
            $this->connexion();
        }
    }

    private function connexion(){


        $this->_view = new View('Connexion');
        $this->_view->generate(array());

    }


    private function process()
    {
        $this->_view = new View('Connexion');
        $requiredFields = array('email', 'mdp');
        $error = false;
        foreach($requiredFields as $_field)
        {

            if(!isset($_POST[$_field]) || empty($_POST[$_field]))
            {
                $error = true;
                $messageErr = "Vous devez remplir les champs !";
            }
            else
            {
                $uti = $this->_utilisateurManager->connexion($_POST['email'], $_POST['mdp']);
                if (empty($uti)){
                    $error = true;
                    $messageErr = "Mauvais identifiants !";
                }else{
                    $uti = $uti[0];
                }
            }
        }
        if($error)
        {
            $this->_view->generate(array("messageErr"=>$messageErr));
        }
        else
        {
            setcookie('UTI_MAIL', $uti->getUtiMail(), time() + 24*3600, null, null, false, true);
            setcookie('UTI_MDP', $uti->getUtiMdp(), time() + 24*3600, null, null, false, true);
        }

    }

}