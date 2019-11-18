<?php


class Router
{
    private $_ctrl;
    private $_view;

    public function routeReq(){

        try{
            //Chargement automatique des classes
            spl_autoload_register(function($class){
                requiere_once('models/'.$class.'.php');
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
                require_once('controllers/ControllerAcceuil.php');
                $this->_ctrl = new ControllerAccueil($url);
            }

        }
        //Gestion des erreurs
        catch (Exception $e)
        {
            $errorMsg = $e->getMessage();
            requiere_once('views/viewError.php');
        }
    }

}