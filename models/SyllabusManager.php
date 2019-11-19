<?php
require_once('Syllabus.php');

class SyllabusManager extends Model
{


    public function getAll(){

        $var = [];
        $req = "SELECT * FROM SYL_SYLLABUS JOIN SYL_ENSEIGNANTS USING (ENS_NUM) JOIN SYL_UTILISATEUR USING (UTI_NUM)";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new Syllabus($data);
        }
        $req->closeCursor();

        return $var;
    }

    public function getSyllabus($sylNum){
        $var = [];
        $req = "SELECT * FROM SYL_SYLLABUS JOIN SYL_ENSEIGNANTS USING (ENS_NUM) JOIN SYL_UTILISATEUR USING (UTI_NUM) WHERE SYL_NUM = '".$sylNum."'";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new Syllabus($data);
        }
        $req->closeCursor();

        return $var;
    }

    public function existe($sylNum){

        $req = "SELECT * FROM SYL_SYLLABUS WHERE SYL_NUM = '".$sylNum."'";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new Syllabus($data);
        }
        $req->closeCursor();

        if (!empty($var)){
            return true;
        }else{
            return false;
        }

    }

    public function supprimer($sylNum){

        $req="DELETE FROM SYL_SYLLABUS WHERE SYL_NUM = $sylNum";
        $req = self::getBdd()->prepare($req);
        $req->execute();

    }


}