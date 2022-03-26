<p><a href="./?controller=praticien&task=showEspace">Retour </a></p>
<?php

foreach ($donnesPatient as $key => $value) : ?>
  <h5><?= $key ?> : <?= $value ?></h5>
<?php endforeach ?>

Ou autre manière :

<?php
extract($donnesPatient); ?>
<!-- Pour savoir si qu'il y a dans $donnesPatient -> var_dump($donnesPatient) -->
<h5> <?= $id ?> </h5>
<h5> <?= $nom ?> </h5>
<h5> <?= $prenom ?> </h5>

<!-- etc ... -->