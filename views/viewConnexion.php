<?php
$this->_t = 'Connexion';
?>

<head>
    <meta charset="utf-8">
    <title><?= $this->_t?></title>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <script src="../js/formConnexion.js"></script>
    <script>

        function msg() {
            document.getElementById('messageErr').style.display = 'none';
        }
        setTimeout("msg()",2000);

    </script>
</head>
<body style="background-color: #96188B">

<main style="background-color: #96188B">
    <div id="login" class="row" style="margin-top: 10%">
        <div class="card-panel col s12 offset-m3 m6 offset-l3 l6 z-depth-6" style="padding: 50px;">
            <div class="center row">
                <h4>Connexion</h4>
                <form action="/Connexion/process/" class="login-form" method="post">
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix pt-2">person_outline</i>
                            <input type="text" id="name" data-length="20" name="email">
                            <label for="name" class="center-align">Adresse mail</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix pt-2">lock_outline</i>
                            <input type="password" id="pass" data-length="40" name="mdp">
                            <label for="pass">Mot de passe</label>
                        </div>
                    </div>

                    <div id="messageErr" class="row" id="alert_box">

                        <?php if (isset($messageErr)){echo $messageErr;}?>

                    </div>

                    <div class="row">
                        <input type="submit" value="Connexion" class="btn btn-large blue">
                    </div>
                    <div class="row">
                        <div id="resultat"></div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>
</body>