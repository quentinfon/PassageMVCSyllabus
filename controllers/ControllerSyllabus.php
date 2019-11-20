<?php
require_once('views/View.php');

class ControllerSyllabus
{
    private $_syllabusManager;
    private $_view;

    public function __construct($url)
    {

        require_once('models/SyllabusManager.php');
        $this->_syllabusManager = new SyllabusManager();

        if (isset($url) && count($url) > 3) {
            throw new Exception('Page introuvable');
        }
        else if(isset($url[1]) && $url[1] == "ajouter"){
            $this->ajouterSyllabus();
        }
        else if(isset($url[1], $_POST['NUM_SYL']) && $url[1] == "consulter"){
            $this->consulterUnSyllabus($_POST['NUM_SYL']);
        }
        else if(isset($url[1], $url[2]) && $url[1] == "supprimer"){
            $this->supprimerUnSyllabus();
        }
        else if(isset($url[1], $url[2]) && $url[1] == "modifier"){
            $this->modifierUnSyllabus();
        }
        else {

            $this->listSyllabus();

        }
    }

    private function listSyllabus(){

        $syllabus = $this->_syllabusManager->getAll();

        $this->_view = new View('ListeSyllabus');

        $this->_view->generate(array('syllabus' => $syllabus));

    }

    private function ajouterSyllabus(){
        $listeEnseignants = UtilisateurManager::getAllEnseignants();
        $this->_view = new View('FormulaireSyllabusAdmin');
        $this->_view->generate(array('listeEnseignants'=>$listeEnseignants));
    }

    private function consulterUnSyllabus($sylNum){
        $syllabus = $this->_syllabusManager->getSyllabus($sylNum);
        $this->_view = new View('AfficherUnSyllabus');
        $this->_view->generate(array('syllabus'=>$syllabus));

    }

    private function supprimerUnSyllabus($sylNum){

    }

    private function modifierUnSyllabus($sylNum){

    }

}