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

        if (isset($url) && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {

            $this->listSyllabus();

        }
    }

    private function listSyllabus(){

        $syllabus = $this->_syllabusManager->getAll();

        $this->_view = new View('ListeSyllabus');

        $this->_view->generate(array('syllabus' => $syllabus));

    }

}