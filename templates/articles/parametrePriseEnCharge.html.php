<?php
foreach ($donnesPraticien as $donnePraticien) : ?>
  <h5>id : <?= $donnePraticien['id'] ?></h5>
  <h5>id adresse: <?= $donnePraticien['id_adresse'] ?></h5>
  <h5>nom cabinet: <?= $donnePraticien['nom_cabinet'] ?></h5>
  <h5>nom : <?= $donnePraticien['nom'] ?></h5>
  <h5>prenom : <?= $donnePraticien['prenom'] ?></h5>
  <h5>mail : <?= $donnePraticien['mail'] ?></h5>
  <h5>mot de passe : <?= $donnePraticien['mot_de_passe'] ?></h5>
  <h5>profession : <?= $donnePraticien['profession'] ?></h5>
  <h5>tel : <?= $donnePraticien['tel'] ?></h5>
  <h5>num_adelie : <?= $donnePraticien['num_adelie'] ?></h5>
  <h5>date_inscription : <?= $donnePraticien['date_inscription'] ?></h5>


<?php endforeach ?>