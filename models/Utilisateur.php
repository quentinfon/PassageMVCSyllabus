<?php


class Utilisateur
{
    //Global
    private $_utiNum;
    private $_utiMail;
    private $_utiNom;
    private $_utiPrenom;
    private $_utiMdp;
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

    public function setUti_mdp($mdp){
        $this->_utiMdp = $mdp;
    }

    public function setUti_mail($id){
        $this->_utiMail = $id;
    }

    public function setUti_nom($id){
        $this->_utiNom = $id;
    }

    public function setUti_prenom($id){
        $this->_utiPrenom = $id;
    }

    public function setEns_num($id){
        $this->_ensNum = $id;
    }

    public function setEns_statut($id){
        $this->_ensStatut = $id;
    }

    public function getUtiNum()
    {
        return $this->_utiNum;
    }

    public function getUtiMdp()
    {
        return $this->_utiMdp;
    }

    public function getUtiMail()
    {
        return $this->_utiMail;
    }

    public function getUtiNom()
    {
        return $this->_utiNom;
    }

    public function getUtiPrenom()
    {
        return $this->_utiPrenom;
    }

    public function getEnsNum()
    {
        return $this->_ensNum;
    }

    public function getEnsStatut()
    {
        return $this->_ensStatut;
    }





}