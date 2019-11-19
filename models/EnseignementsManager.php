<?php


class EnseignementsManager extends Model
{

    public static function getPromos(){
        $req="SELECT * FROM SYL_PROMOTIONS";
        $req = self::getBdd()->prepare($req);
        $req->execute();

        return $req->fetchAll();
    }

}