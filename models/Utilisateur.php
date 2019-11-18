<?php


class Utilisateur
{
    //Global
    private $_utiNum;
    private $utiMail;
    private $_utiNom;
    private $_utiPrenom;
    //Ens
    private $_ensNum;
    private $_ensStatut;


    public function __construct(array $data){
        $this->hydrate($data);
    }

    //Hydratation
    public function hydrate(array  $data){

        foreach($data as $key => $value){

            $method = 'set'.ucfirst(strtolower($key));

            if(method_exists($this, $method)){
                $this->$method($value);
            }

        }
    }

    public function setUti_num($id){
        $id = (int) $id;
        if($id > 0){
            $this->_utiNum = $id;
        }
    }

}