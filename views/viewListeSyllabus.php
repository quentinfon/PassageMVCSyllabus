<?php
$this->_t = "Syllabus";
?>

<body>
<div class="affichage">

    <form method="post" action="/syllabus/consulter" id="formSyl"/>

    <table class="col-md-12 table">
        <tr>
            <th>Nom Syllabus</th>
            <th>Créé par</th>
            <th>Consulter</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php
        foreach ($syllabus as $row) {
            ?>
            <tr>
                <td>
                    <p class="text-left">
                        <?php echo $row->getSylNom(); ?>
                    </p>
                </td>
                <td>
                    <p class="text-left">
                        <?php echo $row->getAutNom()." ".$row->getAutPrenom(); ?>
                    </p>
                </td>

                <td>
                    <button  class="btn btn-dark" type="submit" form="formSyl" name="NUM_SYL" value="<?php echo $row->getSylNum()?>">Consulter</button>
                </td>

                <td><a class="btn btn-primary" href=<?php echo "";?>>
                        Modifier
                    </a>
                </td>

                <td><a class="btn btn-danger" href=<?php echo "";?>>
                        Supprimer
                    </a>
                </td>
            </tr>

            <?php
        }
        ?>
    </table>
</div>
</body>
