
 <div style="margin-left: auto; margin-right: auto;">
            <div>
                <h1><?php echo $syllabus->getSylNom();?></h1>
            </div>
            <div>
                Rédigé par : <?php echo $syllabus->getNomComplet();
                ?>
            </div>
            <div>
                <div>
                    EC : <?php

                   echo $syllabus->getEC();

                    ?>
                </div>
                <div>
                    UE : <?php

                    echo $syllabus->getUE();

                    ?>
                </div>
                <div>
                    Promo : <?php

                    echo $syllabus->getPromo();

                    ?>
                </div>
                <div>
                    Nombre d'heures du module :
                </div>
            </div>
            <div>
                Description : <?php
                echo $syllabus->getSylDesc();
                ?>
            </div>
            <div>
                Plan du cours : <?php
                echo $syllabus->getSylPlanCours();
                ?>
            </div>
            <div>
                Langue parlée pendant le cours : <?php
                echo $syllabus->getSylLanque();
                ?>
            </div>
            <div>
                Nombre d'heures syllabus :
            </div>
            <div>
                Contenu du cours : <?php
                echo $syllabus->getSylContenu();
                ?>
            </div>
            <div>
                Objectifs : <?php
                echo $syllabus->getSylObjectifs();
                ?>
            </div>


            <?php
            if (Router::$_utilisateur->estAdmin()){
                ?>
                <div>
                    Remarques au responsable pédagogique : <?php
                    echo $syllabus->getSylRemarque();
                    ?>
                </div>
                <?php
            }
            ?>

            <br><br>
            <div>

                <a class="btn btn-primary" href="/syllabus">
                    Retour
                </a>

            </div>

        </div>



