<?php
$this->_t = 'Modification';
?>

<form method="post" action="/utilisateurs/consulter">
<input type="hidden" name="uti_num" value="<?php echo $utilisateur->getUtiNum();?>">


<table class="table table-dark">
    <thead>
    <tr>
        <th colspan="2">INFORMATION UTILISATEUR</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Nom / Prénom</td>
        <td>
            <input type="text" name="nom_utilisateur" value="<?php echo  $utilisateur->getUtiNom(); ?>">
            <input type="text" name="prenom_utilisateur" value="<?php echo  $utilisateur->getUtiPrenom(); ?>">
            </td>
    </tr>
    <tr>
        <td>Rôle</td>
        <td>
            <input type="checkbox" onchange="promoSelect()" id="roleEleve" name="role[]" value="eleve" <?php
            if($utilisateur->estEtudiant()){
                echo "checked";
            } ?>>
            <label for="roleEleve">Etudiant</label>

            <input type="checkbox" onchange="infoProfCheck()" id="roleEns" name="role[]" value="enseignant" <?php
            if($utilisateur->estEnseignant()){
                echo "checked";
            } ?>>
            <label for="roleEns">Enseignant</label>

            <input type="checkbox" id="roleAdmin" name="role[]" value="admin" <?php
            if($utilisateur->estAdmin()){
                echo "checked";
            } ?>>
            <label for="roleAdmin">Administrateur</label>

            <div id="promoEleve">
                <br>
                <select name="pro_code">
                    <option value="">----</option>
                    <?php
                    foreach ($promos as $p){?>
                            <option name='<?php echo $p["PRO_CODE"];?>' <?php
                    if($utilisateur->estEtudiant() && $p["PRO_CODE"]==$utilisateur->getPromoCode()){
                        echo "selected";
                    } ?>
                            > <?php echo $p["PRO_CODE"]; ?> </option>
                    <?php

                    }

                    ?>
                </select>

            </div>



            </td>
    </tr>
    <tr>
        <td>Adresse email</td>
        <td> <input type="text" name="mail" value="<?php echo  $utilisateur->getUtiMail(); ?> "></td>

    </tr>
    </tbody>
</table>

    <div id="infoProf">
        <table class="table table-dark">
            <tbody>
        <tr>
            <td>Numéro de téléphone</td>
            <td>
                <input type="text" name="telephone" value="<?php

                if ($utilisateur->estEnseignant()) {
                    echo $utilisateur->getEnsTel();
                }
                ?>">

               </td>
        </tr>
        <tr>
            <td>Statut</td>
            <td><?php if ($utilisateur->estEnseignant()) {
                    echo $utilisateur->getEnsStatut();
                } ?></td>
        </tr>
        <tr>
            <td>Disponibilité</td>
            <td><?php if ($utilisateur->estEnseignant()) {
                    echo $utilisateur->getEnsDispo();
                } ?></td>
        </tr>

            </tbody>
        </table>
    </div>





<a class="btn btn-primary" href="javascript:history.back()">
    Retour
</a>
<input type="submit" name="modifier" value="Modifier" class="btn btn-danger" >



</form>

<script type="text/javascript">

    function promoSelect(){
        var roleSel = document.getElementById("roleEleve");

        if (roleSel.checked == true){
            document.getElementById('promoEleve').style.display = 'initial';
        }else{
            document.getElementById('promoEleve').style.display = 'none';
        }

    }

    function infoProfCheck(){
        var roleSel = document.getElementById("roleEns");

        if (roleSel.checked == true){
            document.getElementById('infoProf').style.display = 'initial';
        }else{
            document.getElementById('infoProf').style.display = 'none';
        }
    }


</script>

<?php
if (!$utilisateur->estEtudiant()){
    echo"<script>document.getElementById('promoEleve').style.display = 'none';</script>";
}else{
    echo "<script>document.getElementById('promoEleve').style.display = 'initial';</script>";
}

if(!$utilisateur->estEnseignant()){
    echo"<script>document.getElementById('infoProf').style.display = 'none';</script>";
}else{
    echo "<script>document.getElementById('infoProf').style.display = 'initial';</script>";
}


?>
