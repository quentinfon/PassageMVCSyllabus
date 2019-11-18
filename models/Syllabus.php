<?php


class Syllabus
{
    private $_sylNum;
    private $_ensNum;
    private $_sylNom;
    private $_sylDesc;
    private $_sylPlanCours;
    private $_sylLanque;
    private $_sylDuree;
    private $_sylContenu;
    private $_sylObjectifs;
    private $_sylRemarque;


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

    public function setSyl_num($id){
        $id = (int) $id;
        if($id > 0){
            $this->_sylNum = $id;
        }
    }

    public function setEns_num($num){
        $num = (int) $num;
        if($num > 0){
            $this->_ensNum = $num;
        }
    }

    public function setSyl_nom($data){
        $this->_sylNom = $data;
    }

    public function setSyl_description($data){
        $this->_sylDesc = $data;
    }

    public function setSyl_plan_cours($data){
        $this->_sylPlanCours = $data;
    }

    public function setSyl_langue($data){
        $this->_sylLanque = $data;
    }

    public function setSyl_duree($data){
        $this->_sylDuree = $data;
    }

    public function setSyl_contenu($data){
        $this->_sylContenu = $data;
    }

    public function setSyl_objectifs($data){
        $this->_sylObjectifs = $data;
    }

    public function setSyl_remarque_resp_pedagogique($data){
        $this->_sylRemarque = $data;
    }

    public function getSylNum()
    {
        return $this->_sylNum;
    }

    public function getEnsNum()
    {
        return $this->_ensNum;
    }

    public function getSylNom()
    {
        return $this->_sylNom;
    }


    public function getSylDesc()
    {
        return $this->_sylDesc;
    }


    public function getSylPlanCours()
    {
        return $this->_sylPlanCours;
    }


    public function getSylLanque()
    {
        return $this->_sylLanque;
    }


    public function getSylDuree()
    {
        return $this->_sylDuree;
    }


    public function getSylContenu()
    {
        return $this->_sylContenu;
    }


    public function getSylObjectifs()
    {
        return $this->_sylObjectifs;
    }

    public function getSylRemarque()
    {
        return $this->_sylRemarque;
    }


}