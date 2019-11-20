<form action="../backend/traitementCreerPreSyllabus.php" method="post" class="col-sm-10"><br/>

    <h1>Pré-création syllabus</h1>


    <div>
        <label for="intitule_cours">Intitulé apogée de ce cours :</label>
        <input type="text" class="form-control form-control-lg" placeholder="Entrer ici le nom du cours" name="intitule_cours">
    </div>

    <div>
        <label for="descriptionsyllabus">Description du syllabus :</label>
        <textarea id="descriptionsyllabus" name="descriptionsyllabus" placeholder="Entrez le texte ici" rows="6" class="md-textarea form-control" ></textarea><br>
    </div>

    <div>
        <label for="enesignantSyl">Enseignant chef du syllabus :</label>
        <select class="custom-select custom-select-lg mb-3" name="creation_prof" id="enesignantSyl">
            <option value="choisir">Sélectionnez un enseignant</option>
            <?php
            foreach($listeEnseignants as $ens){
                echo "<option value='".$ens->getEnsNum()."'>".$ens->getUtiNom()." ".$ens->getUtiPrenom()."</option>";
            }

            ?>

        </select><br/><br/>
    </div>







    <div>
        <label for="promoSyl">Promotion du syllabus :</label>
        <select class="custom-select custom-select-lg mb-3" id="promoSyl" name="moduleSyl" >
            <option value=''>Sélectionnez un module</option><br/>
            <?php

            for($i = 0; $i<sizeof($listeEC); $i++ ){
                $promo = $listeEC[$i]["PRO_CODE"];
                $uecode = $listeEC[$i]["UE_CODE"];
                $eccode = $listeEC[$i]["EC_CODE"];

                echo "<option value='".$promo."+*+".$uecode."+*+".$eccode."'>".$promo." ".$uecode." ".$eccode."</option><br/>";
            }
            ?>
        </select><br/><br/>
    </div>

    <button class="btn btn-success" type="submit" name="action_creation">Créer le syllabus
        <i class="fa fa-check-circle" aria-hidden="true"></i>
    </button>
    <button class="btn btn-danger" type="reset" name="action">Effacer
        <i class="fa fa-times-circle" aria-hidden="true"></i>
    </button>

</form>

