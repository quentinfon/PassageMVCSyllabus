<?php
require_once('views/View.php');

class Router
{
    public $_utilisateur;
    private $_ctrl;
    private $_view;

    public function routeReq(){

        if (isset($_COOKIE['UTI_MAIL'], $_COOKIE['UTI_MDP'])){
            $this->_ctrl = new UtilisateurManager();

            $_utilisateur = $this->_ctrl->connexionCookies( $_COOKIE['UTI_MAIL'], $_COOKIE['UTI_MDP']);

            if (!empty($_utilisateur)){
                $_utilisateur = $_utilisateur[0];

                try{
                    //Chargement automatique des classes
                    spl_autoload_register(function($class){
                        require_once('models/'.$class.'.php');
                    });

                    $url = '';

                    //Le controller est inclus selon l'action de l'utilisateur
                    if(isset($_GET['url']))
                    {
                        $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                        //Nom du controller = premiere info de l'url avec la premiere lettre en maj
                        $controller = ucfirst(strtolower($url[0]));
                        $controllerClass = "Controller".$controller;
                        $controllerFile = "controllers/".$controllerClass.".php";

                        if(file_exists($controllerFile))
                        {
                            require_once($controllerFile);
                            $this->_ctrl = new $controllerClass($url);
                        }
                        else
                        {
                            throw new Exception('Page introuvable');
                        }
                    }
                    else
                    {
                        require_once('controllers/ControllerAccueil.php');
                        $this->_ctrl = new ControllerAccueil($url);
                    }

                }
                catch (Exception $e)
                {
                    $errorMsg = $e->getMessage();
                    $this->_view = new View('Error');
                    $this->_view->generate((array('errorMsg' => $errorMsg)));
                }
            }else{
                throw new Exception('Mauvais cookies');
            }

        }else{
            //Pas connecté
            require_once('controllers/ControllerConnexion.php');
            $this->_ctrl = new ControllerConnexion('');
        }


    }

    public function rootTo($url){
        $url = explode("/", $url);
        $controller = ucfirst(strtolower($url[0]));
        $controllerClass = "Controller".$controller;
        $controllerFile = "controllers/".$controllerClass.".php";
        if(file_exists($controllerFile))
        {
            require_once($controllerFile);
            $this->_ctrl = new $controllerClass($url);
        }
        else
        {
            throw new Exception('Page introuvable');
        }

    }

}