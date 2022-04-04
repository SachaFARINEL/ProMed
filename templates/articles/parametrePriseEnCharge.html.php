<link rel="stylesheet" href="../../assets//css//styles.css" type="text/css">

<p><a href="./?controller=praticien&task=showEspace">Retour </a></p>

<?php
foreach ($donnesPraticien as $key => $value) : ?>
  <h5><?= $key ?> : <?= $value ?></h5>
<?php endforeach ?>

<?php endforeach ?>