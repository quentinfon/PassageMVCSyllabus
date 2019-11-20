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

    public function getAll(){

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



    public static function miseAJour($data){

        if(isset($data['uti_num'], $data['utiNom'], $data['utiPrenom'], $data['utiMail'], $data["role"])){

            $uti = UtilisateurManager::getUti($data['uti_num']);

            $req="UPDATE SYL_UTILISATEUR SET UTI_MAIL = '".$data['utiMail']."', UTI_NOM = '".$data['utiNom']."' , UTI_PRENOM = '".$data['utiPrenom']."' WHERE UTI_NUM = '".$data['uti_num']."'";
            $req = self::getBdd()->prepare($req);
            $req->execute();

            //Futur roles
            $eleve =false;
            $enseignant = false;
            $admin = false;
            for($i=0; $i<sizeof($data["role"]);$i++){
                if($data["role"][$i] == "eleve"){
                    $eleve = true;
                }elseif($data["role"][$i] == "enseignant"){
                    $enseignant = true;
                }else if($data["role"][$i] == "admin"){
                    $admin = true;
                }
            }

            if (isset($data['ensTel'])){

            }
            if (isset($data['etuPromo'])){

            }


        }

    }



}