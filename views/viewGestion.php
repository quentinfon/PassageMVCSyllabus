<?php
$this->_t = 'Gestion';
?>

<body>
<br><br>
<div id="panel" class="row">

    <div id="gestionSyllabus" class="col-md-2 mb-3 mx-auto">
        <ul class="list-group">
            <li class="list-group-item active"><b>Syllabus</b></li>
            <a href='/syllabus'><li class="list-group-item">Gestion</li></a>
            <a href='frontend/formulaire.php'><li class="list-group-item">Créer</li></a>
        </ul>
    </div>

    <div id="gestionPersonnes" class="col-md-2 mb-3 mx-auto">
        <ul class="list-group">
            <li class="list-group-item active"><b>Utilisateurs</b></li>
            <a href='/utilisateurs'><li class="list-group-item">Gestion</li></a>
            <a href='frontend/creationCompte.php'><li class="list-group-item">Créer</li></a>
        </ul>
    </div>

    <div id="gestionAppliWeb" class="col-md-2 mb-3 mx-auto">
        <ul class="list-group">
            <li class="list-group-item active"><b>Autre</b></li>
            <a href='frontend/creationUE.php'><li class="list-group-item">Gestion des UE</li></a>
            <a href='frontend/creationModule.php'><li class="list-group-item">Gestion des Modules</li></a>
        </ul>
    </div>


</div>
</body>
