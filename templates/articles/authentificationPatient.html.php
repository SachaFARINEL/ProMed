<div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action=".?controller=patient&task=auth" method="POST">
                <h3 class="py-2">Formulaire Patient : </h3>

                <!-- Email -->
                <div class="form-outline mb-4">
                    <input type="email" name="mail" id=" form3Example3" class="form-control form-control-lg" placeholder="Entrez votre adresse e-mail" />

                </div>

                <!-- Password -->
                <div class="form-outline mb-3">
                    <input type="password" name="mot_de_passe" id="form3Example4" class="form-control form-control-lg" placeholder="Entrez votre mot de passe" />
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" value="Valider" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">S'authentifier</button>
                    </div>


            </form>
        </div>
    </div>
</div>
</section>




<?php

/**
 * Extraction de toutes les données de table patient par colonne (cela va être utile pour constituer les fiches patient)
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