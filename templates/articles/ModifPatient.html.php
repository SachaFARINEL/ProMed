<!-- <?php
        extract($donneesTablePatient);
        extract($donneesAdresse);
        extract($donneesRdv);

        ?> -->


<section style="background-color: #FAFAFF;">
    <div class="container py-5" style="background-color: #FAFAFF">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px'>
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <input type="text" class="mt-3" value=<?= $nom ?>>
                        <p class="text-muted mb-1"> <?= ($genre === 'M' ? 'Né' : 'Née') . ' ' . 'le' . ' ' . Controllers\Utils::dateToFrench($date_naissance, 'j F Y') ?>
                            <hr>
                        <p class="text-muted mb-1"><?= $numero . ' ' . ($type_de_voie === 'Autre' ? ' ' : $type_de_voie) . ' ' . $adresse . ', ' . $code_postal . ' ' . $ville  ?></p>

                        <p class="text-muted mb-1"><?= $out = Controllers\Utils::espaceTelephone($tel) ?></p>
                        <p class="text-muted mb-3"><?= $mail ?></p>
                        <p class="text-muted mb-3"><?= $activite ?></p>
                    </div>
                </div>
                <div class="card mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px'>
                    <div class="card-body text-center">
                        <h5>Données liées aux soins</h5>
                        <hr>
                        <p class="text-muted mb-1">Numéro de sécurité sociale : <strong><?= $num_secu ?></strong>
                        </p>
                        <p class="text-muted mb-1">
                            <strong><?= $mutuelle ?></strong>
                        </p>
                        <p class="text-muted mb-3">Caisse d'assurance maladie : <strong><?= $caisse ?></strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="col-lg-8">

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <h5>Tuteur du Patient :</h5>
                                <hr>
                                <div class="col-sm-3">
                                    <p class="mb-0">Nom Prénom</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $prenom_tuteur . ' ' . $nom_tuteur ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Adresse Mail</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $mail_tuteur ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $tel_tuteur ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Adresse</p>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <!--<//?= $numero_tuteur  . ' ' . $adresse_tuteur . ' ' .  $ville_tuteur . ' ' . $code_postal_tuteur ?></p> !-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card mb-8">
                        </div>
                    </div>
                </div>
                <br>

</section>
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