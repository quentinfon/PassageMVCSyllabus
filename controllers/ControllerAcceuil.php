<?php

class ControllerAcceuil
{

    private $_acceuilManager;
    private $_view;

    public function __constructor($url){

        if (isset($url) && count($url)>1){
            throw new Exception('Page introuvable');
        }
        else
        {
            $this->acceuil();
        }
    }

    private function acceuil(){
        $this->_acceuilManager = new acceuilManager();
    }

}
