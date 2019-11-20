 <?php
    $syllabus = new Syllabus();
 ?>
 <div style="margin-left: auto; margin-right: auto;">
            <div>
                <h1><?php echo $syllabus->getSylNom();?></h1>
            </div>
            <div>
                Rédigé par : <?php $syllabus->getNomComplet();
                ?>
            </div>
            <div>
                <div>
                    EC : <?php

                    $syllabus->getEC();

                    ?>
                </div>
                <div>
                    Nombre d'heures du module :
                </div>
            </div>
            <div>
                Description : <?php
                $syllabus->getSylDesc();
                ?>
            </div>
            <div>
                Plan du cours : <?php
                $syllabus->getSylPlanCours();
                ?>
            </div>
            <div>
                Langue parlée pendant le cours : <?php
                $syllabus->getSylLanque();
                ?>
            </div>
            <div>
                Nombre d'heures syllabus :
            </div>
            <div>
                Contenu du cours : <?php
                $syllabus->getSylContenu();
                ?>
            </div>
            <div>
                Objectifs : <?php
                $syllabus->getSylObjectifs();
                ?>
            </div>


            <?php
            if (Router::$_utilisateur->estAdmin()){
                ?>
                <div>
                    Remarques au responsable pédagogique : <?php
                    $syllabus->getSylRemarque();
                    ?>
                </div>
                <?php
            }
            ?>

            <br><br>
            <div>

                <a class="btn btn-primary" href="../frontend/affichagesyllabus.php">
                    Retour
                </a>

            </div>

        </div>



