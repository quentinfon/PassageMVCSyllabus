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
    private $_ensDispo;
    private $_ensTel;

    //Etu
    private $_promoCode;

    //Roles
    private $_ens;
    private $_admin;
    private $_etu;


    public function __construct(array $data){
        $this->hydrate($data);

        if (isset($this->_utiNum)){

            if(UtilisateurManager::estEnseignant($this->_utiNum)){
                $this->_ens = true;
                $donnees = UtilisateurManager::infoEns($this->_utiNum);
                $this->_ensTel = $donnees[0]["ENS_TELEPHONE"];
                $this->_ensStatut = $donnees[0]["ENS_STATUT"];
                $this->_ensDispo = $donnees[0]["ENS_DISPONIBILITEE"];
            }else{
                $this->_ens = false;
            }

            $this->_admin = UtilisateurManager::estAdmin($this->_utiNum);

            if(UtilisateurManager::estEtudiant($this->_utiNum)){
                $this->_etu = true;
                $donnees = UtilisateurManager::infoEtu($this->_utiNum);
                $this->_promoCode = $donnees[0]["PRO_CODE"];
            }else{
                $this->_etu = false;
            }

        }

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

    public function estEnseignant(){
        return $this->_ens;
    }
    public function estAdmin(){
        return $this->_admin;
    }
    public function estEtudiant(){
        return $this->_etu;
    }

    public function getEnsDispo()
    {
        return $this->_ensDispo;
    }

    public function getPromoCode()
    {
        return $this->_promoCode;
    }

    public function getEnsTel()
    {
        return $this->_ensTel;
    }

    public function setEns_tel($tel){
        $this->_ensTel = $tel;
    }

    public function setPro_code($c){
        $this->_promoCode = $c;
    }

    public function devientEns(){
        $this->_ens = true;
    }
    public function devientEtu(){
        $this->_etu = true;
    }
    public function devientAdmin(){
        $this->_admin = true;
    }



}