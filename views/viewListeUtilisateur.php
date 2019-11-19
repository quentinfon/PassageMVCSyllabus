<?php
$this->_t = 'Utilisateurs';
?>

<form method="post" action="afficherDetailUtilisateur.php" id="formUtilisateur"/>

<table class="col-md-12 table">
    <tr>
        <th>Nom Prénom</th>
        <th>Mail</th>
        <th>Consulter</th>
        <th>Supprimer</th>
    </tr>

    <?php
    foreach($utilisateurs as $uti){
        ?>
        <tr>
            <td>
                <p class="text-left">
                    <?php echo $uti->getUtiNom()." ".$uti->getUtiPrenom(); ?>
                </p>
            </td>
            <td>
                <p class="text-left">
                    <?php echo $uti->getUtiMail(); ?>
                </p>
            </td>

            <td>
                <button  class="btn btn-dark" type="submit" form="formUtilisateur" name="uti_num" value="<?php  ?>">Consulter</button>
            </td>

            <td><a class="btn btn-danger" href="">
                    Supprimer
                </a>
            </td>
        </tr>


        <?php

    }

    ?>

</table>

