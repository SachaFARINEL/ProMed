<?php
echo 'Bienvenue sur votre espace' . ' ' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'];
?>
<p><a href="./?controller=patient&task=logout">Se déconnecter</a></p>