<?php


class ControllerSyllabus
{
    private $_syllabusManager;
    private $_view;

    public function __constructor($url){

        if (isset($url) && count($url)>1){
            throw new Exception('Page introuvable');
        }
    }

}