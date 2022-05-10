<?php
extract($donneesTablePatient);
extract($donneesAdresse);
extract($donneesRdv);

?>


<div class="row">
    <div class="main col-8">
        <div class="container">
            <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif">
                <h2 class="mesRdv fs-4">Mes rendez-vous de la journée</h2>
            </div>
        </div>

        <div class="container">
            <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif">
                <h2 class="mesRdv fs-4">Historiques de mes rendez-vous</h2>
            </div>
        </div>
    </div>
    <div class="main col-4">
        <div class="container">
            <div class="rdvAutre rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif">
                <h2 class="mesRdv fs-4">Something</h2>
            </div>
        </div>
    </div>
</div>
<?php

/**
 * Extraction de toutes les données de table patient par colonne
 */
/*

foreach ($patients as $patient) : ?>
    <h2>id : <?= $patient['id'] ?></h2>
    <h2>id_adresse :<?= $patient['id_adresse'] ?></h2>
    <h2>nom :<?= $patient['nom'] ?></h2>
    <h2>prenom:<?= $patient['prenom'] ?></h2>
    <h2>mail :<?= $patient['mail'] ?></h2>
    <h2>tel :<?= $patient['tel'] ?></h2>
    <h2>mot_de_passe :<?= $patient['mot_de_passe'] ?></h2>
    <h2>activite :<?= $patient['activite'] ?></h2>
    <h2>num_secu :<?= $patient['num_secu'] ?></h2>
    <h2>mutuelle :<?= $patient['mutuelle'] ?></h2>
    <h2>caisse :<?= $patient['caisse'] ?></h2>
    <h2>date_naissance :<?= $patient['date_naissance'] ?></h2>
    <h2>sexe :<?= $patient['sexe'] ?></h2>
    <h2>nom_tuteur :<?= $patient['nom_tuteur'] ?></h2>
    <h2>prenom_tuteur :<?= $patient['prenom_tuteur'] ?></h2>
    <h2>mail_tuteur :<?= $patient['mail_tuteur'] ?></h2>
    <h2>tel_tuteur :<?= $patient['tel_tuteur'] ?></h2>
    <h2>nom_generaliste :<?= $patient['nom_generaliste'] ?></h2>
    <h2>prenom_generaliste :<?= $patient['prenom_generaliste'] ?></h2>
    <h2>mail_generaliste :<?= $patient['mail_generaliste'] ?></h2>
    <h2>num_generaliste :<?= $patient['num_generaliste'] ?></h2>

<?php endforeach ?>
*/