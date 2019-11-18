<?php


class UtilisateurManager extends Model
{

    public function getRoles($id){
        $this->getBdd();

        $role = array();

        $reqAdmin = "SELECT UTI_NUM FROM SYL_ADMIN WHERE UTI_NUM = '".$id."'";
        $reqEtudiant = "SELECT * FROM SYL_ETUDIANTS WHERE UTI_NUM = '".$id."'";
        $reqEnseignants = "SELECT * FROM SYL_ENSEIGNANTS WHERE UTI_NUM = '".$id."'";

        if(!empty($this->exec($reqAdmin))){
            array_push($role, "ADMIN");
        }
        if(!empty($this->exec($reqEnseignants))){
            array_push($role, "ENSEIGNANT");
        }
        if(!empty($this->exec($reqEtudiant))){
            array_push($role, "ETUDIANT");
        }

        return $role;

    }

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

}