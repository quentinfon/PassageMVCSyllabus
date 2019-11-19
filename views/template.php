<html>
<head>
    <meta charset="utf-8">
    <title><?= $t ?></title>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/frontend/css/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Syllabus IAE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/frontend/formulaire.php">Créer un syllabus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/frontend/creationUE.php">Ajouter une UE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/frontend/creationModule.php">Ajouter un module</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/syllabus">Consulter les syllabus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/deconnexion" onclick = "javascript:confirm('êtes-vous certain ?')">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

</header>


<?= $content ?>

<footer>
    <p>Créé par Thomas Lapierre, Quentin Fontaine, Benjamin Picot et Leo</p>
</footer>
</html>
