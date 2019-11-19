<?php

class View
{
    private $_file;
    private $_t;

    //On crée la vue qui a le nom vue"Action"
    public function __construct($action)
    {
        $this->_file = 'views/view'.$action.'.php';
    }


    //Génére et affiche la vue
    public function generate($data)
    {
        if ($this->_file == "views/viewConnexion.php"){
            $view = $this->generateFile( $this->_file, $data);
        }else{

        // Partie spécifique de la vue
        $content = $this->generateFile( $this->_file, $data);

        //Header et footer (Template)
        $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));
        }

        echo $view;
    }

    //Génére un fichier vue et renvoie le résultat produit
    private function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);

            //mise en tampon
            ob_start();

            //On inclut le fichier vue
            require $file;

            //renvoie du tampon de sortie
            return ob_get_clean();
        }
        else
        {
            throw new Exception('Fichier '.$file.' introuvable');
        }
    }

}
