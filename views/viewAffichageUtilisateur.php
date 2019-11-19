<?php
$this->_t = "Utilisateur";
$role = "";
 if($utilisateur->estEtudiant()){
     $role = $role." Etudiant";
 }
 if($utilisateur->estEnseignant()){
     $role = $role." Enseignant";
 }
 if($utilisateur->estAdmin()){
     $role = $role." Administrateur";
 }
?>

<form method="post" action="modificationUtilisateur.php" id="formModifUtil"/>

<table class="table table-dark">
    <thead>
    <tr>
        <th colspan="2">INFORMATION UTILISATEUR  <button  class="btn btn-primary" type="submit" form="formModifUtil" name="uti_num" value="<?php ?>">Modifier</button></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Nom / Prénom</td>
        <td><?php echo  $utilisateur->getUtiNom()." ".$utilisateur->getUtiPrenom(); ?></td>
</tr>
<tr>
    <td>Rôle</td>
    <td><?php echo  $role; ?></td>
</tr>
<tr>
    <td>Adresse email</td>
    <td><?php echo  $utilisateur->getUtiMail(); ?> <a class="btn btn-danger" href="">
            Restaurer mot de passe
        </a></td>

</tr>
<?php
if($utilisateur->estEnseignant()) {
    ?>
    <tr>
        <td>Numéro de téléphone</td>
        <td><?php

            if ($utilisateur->estEnseignant()) {
                echo $utilisateur->getEnsTel();
            }
            ?></td>
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

    <?php
}
?>


</tbody>
</table>




<?php
if($utilisateur->estEnseignant()){
?>


    <?php


    if (!empty($sylEns)) {

        ?>

<h3>Syllabus</h3>

<table class="col-md-12 table">
    <tr>
        <th>Nom Syllabus</th>
        <th>Description</th>
        <th>Modifier/Consulter</th>
    </tr>
    <?php
        foreach ($sylEns as $row) {

            ?>
            <tr>

                <td>
                    <p class="text-left">
                        <?php echo $row->getSylNom(); ?>
                    </p>
                </td>
                <td>
                    <p class="text-left">
                        <?php echo $row->getSylDesc(); ?>
                    </p>
                </td>


                <td>
                    <button class="btn btn-dark" type="submit" form="formSyl" name="NUM_SYL" value="">Consulter</button>
                </td>

            </tr>

            <?php
        }
    } else {
        echo "Cet enseignant n'a crée aucun syllabus.";
    }
}
?>