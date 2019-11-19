<?php


class ControllerDeconnexion
{
    private $_utilisateurManager;
    private $_view;

    public function __construct($url){

        setcookie('UTI_MAIL', "", time() - 3600);
        setcookie('UTI_MDP', "", time() - 3600);

        header('location: /');
        exit();

    }

}