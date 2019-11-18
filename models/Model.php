<?php


abstract class Model
{
    private $hote = 'mysql:host=localhost;dbname=syllabus_bd;charset=utf8';
    private $utilisateur = "syllabus";
    private $mdpBdd = "bohGhohz2UpohChe";
    private static $_bdd;


    //Instancie la connexion à la bdd
    private static function setBdd(){
        self::$_bdd = new PDO(self::hote, self::utilisateur,self::mdpBdd);
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //Récupére la connexion à la bdd
    protected function getBdd(){
        if(self::$_bdd == null){
            self::setBdd();
        }
        return self::$_bdd;
    }

    protected function inserer($req){
        $res = self::$_bdd->prepare($req);
        $res->execute();
    }

    protected function exec($req){
        $sth = self::$_bdd->prepare($req);
        $sth->execute();
        return $sth->fetchAll();
    }


}