<?php
require_once('models/Model.php');
require_once('models/Utilisateur.php');

class UtilisateurManager extends Model
{

    public function connexion($mail, $mdp){

        $var = [];
        $mdp = hash("sha512", $mdp);
        $req = "SELECT * FROM SYL_UTILISATEUR WHERE UTI_MAIL = '".$mail."' AND UTI_MDP ='".$mdp."'";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new Utilisateur($data);
        }
        $req->closeCursor();

        return $var;
    }

    public function connexionCookies($mail, $mdp){

        $var = [];
        $req = "SELECT * FROM SYL_UTILISATEUR WHERE UTI_MAIL = '".$mail."' AND UTI_MDP ='".$mdp."'";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new Utilisateur($data);
        }
        $req->closeCursor();

        return $var;
    }

    public function getAllUtilisateurs(){

        $var = [];
        $req = "SELECT * FROM SYL_UTILISATEUR";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new Utilisateur($data);
        }
        $req->closeCursor();

        return $var;
    }

    public static function getUti($id){

        $var = [];
        $req = "SELECT * FROM SYL_UTILISATEUR WHERE UTI_NUM = '".$id."'";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new Utilisateur($data);
        }
        $req->closeCursor();

        return $var[0];
    }

    public static function estAdmin($id){

        $req = "SELECT * FROM SYL_ADMIN WHERE UTI_NUM = '".$id."'";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        if (!empty($req->fetchAll())){
            return true;
        }else{
            return false;
        }

    }

    public static function estEtudiant($id){

        $req = "SELECT * FROM SYL_ETUDIANTS WHERE UTI_NUM = '".$id."'";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        if (!empty($req->fetchAll())){
            return true;
        }else{
            return false;
        }

    }

    public static function estEnseignant($id){

        $req = "SELECT * FROM SYL_ENSEIGNANTS WHERE UTI_NUM = '".$id."'";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        if (!empty($req->fetchAll())){
            return true;
        }else{
            return false;
        }

    }

    public static function infoEns($id){

        $req = "SELECT ENS_TELEPHONE, ENS_STATUT, ENS_DISPONIBILITEE FROM SYL_ENSEIGNANTS WHERE UTI_NUM = '".$id."'";

        $req = self::getBdd()->prepare($req);
        $req->execute();
        return $req->fetchAll();

    }

    public static function infoEtu($id){

        $req = "SELECT PRO_CODE FROM SYL_ETUDIANTS WHERE UTI_NUM = '".$id."'";

        $req = self::getBdd()->prepare($req);
        $req->execute();
        return $req->fetchAll();

    }



    public static function miseAJour($utiMaj){


            $utiAvant = UtilisateurManager::getUti($utiMaj->getUtiNum());


            $req="UPDATE SYL_UTILISATEUR SET UTI_MAIL = '".$utiMaj->getUtiMail()."', UTI_NOM = '".$utiMaj->getUtiNom()."' , UTI_PRENOM = '".$utiMaj->getUtiPrenom()."' WHERE UTI_NUM = '".$utiMaj->getUtiNum()."'";
            $req = self::getBdd()->prepare($req);
            $req->execute();


            //Modification Admin
            if ($utiAvant->estAdmin() && !$utiMaj->estAdmin()){
                $reqAdmin="DELETE FROM SYL_ADMIN where UTI_NUM = '".$utiMaj->getUtiNum()."'";
            }else if (!$utiAvant->estAdmin() && $utiMaj->estAdmin()){
                $reqAdmin="INSERT INTO SYL_ADMIN(UTI_NUM) VALUES ('".$utiMaj->getUtiNum()."')";
            }
            if (isset($reqAdmin)){
                $reqAdmin = self::getBdd()->prepare($reqAdmin);
                $reqAdmin->execute();
            }

            //Modification Etudiant
            if ($utiAvant->estEtudiant() && !$utiMaj->estEtudiant()){
                $reqEleve = "DELETE FROM SYL_ETUDIANTS WHERE UTI_NUM = '".$utiMaj->getUtiNum()."'";
            }else if(!$utiAvant->estEtudiant() && $utiMaj->estEtudiant()){
                $reqEleve = "INSERT INTO SYL_ETUDIANTS (UTI_NUM,PRO_CODE) VALUES ('".$utiMaj->getUtiNum()."','".$utiMaj->getPromoCode()."')";
            }else if($utiAvant->estEtudiant() && $utiMaj->estEtudiant()){
                $reqEleve = "UPDATE SYL_ETUDIANTS SET PRO_CODE = '".$utiMaj->getPromoCode()."' WHERE UTI_NUM = '".$utiMaj->getUtiNum()."'";
            }
            if (isset($reqEleve)){
                $reqEleve = self::getBdd()->prepare($reqEleve);
                $reqEleve->execute();
            }

            //Modification Enseignant
            if($utiAvant->estEnseignant() && !$utiMaj->estEnseignant()){

                $reqDejaSyl = "select * from SYL_SYLLABUS where ENS_NUM = '".$utiAvant->getEnsNum()."'";
                $reqDejaSyl = self::getBdd()->prepare($reqDejaSyl);
                $reqDejaSyl->execute();

                if (!empty($reqDejaSyl->fetchAll())){

                    $reqEnseignant = "DELETE FROM SYL_ENSEIGNER WHERE ENS_NUM = '".$utiAvant->getEnsNum()."'";
                    $reqEnseignant = self::getBdd()->prepare($reqEnseignant);
                    $reqEnseignant->execute();

                    $reqEnseignant= "DELETE FROM SYL_ENSEIGNANTS WHERE UTI_NUM = '".$utiMaj->getUtiNum()."'";

                }

            }
            else if($utiAvant->estEnseignant() && $utiMaj->estEnseignant()){

                $reqEnseignant="UPDATE SYL_ENSEIGNANTS SET ENS_TELEPHONE = '".$utiMaj->getEnsTel()."' WHERE UTI_NUM= '".$utiMaj->getUtiNum()."'";

            }
            else if(!$utiAvant->estEnseignant() && $utiMaj->estEnseignant()){
                $reqEnseignant="INSERT INTO SYL_ENSEIGNANTS (UTI_NUM, ENS_TELEPHONE, ENS_STATUT, ENS_DISPONIBILITEE) VALUES ('".$utiMaj->getUtiNum()."', '".$utiMaj->getEnsTel()."', NULL, NULL)";
            }
            if (isset($reqEnseignant)){
                $reqEnseignant = self::getBdd()->prepare($reqEnseignant);
                $reqEnseignant->execute();
            }


    }

    public static function getAllEnseignants(){
        $var = [];
        $req = "SELECT * FROM SYL_UTILISATEUR join SYL_ENSEIGNANTS USING(UTI_NUM) ORDER BY UTI_NOM";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new Utilisateur($data);
        }
        $req->closeCursor();

        return $var;

    }

    public static function getAllEC(){
        $req = "SELECT * FROM SYL_EC";

        $req = self::getBdd()->prepare($req);
        $req->execute();

        $var=$req->fetchAll();

        return $var;

    }




}