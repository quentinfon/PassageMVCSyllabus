<?php
$this->_t = 'Accueil';
?>

<h2>Bienvenue <?php echo Router::$_utilisateur->getUtiPrenom()." ".Router::$_utilisateur->getUtiNom();?></h2>
