<?php
// extract($donneesPatient);
// extract($informationPatient);
// var_dump($donneesPatient);
extract($informationPatient);
?>


<section style="background-color: #FAFAFF;">
  <div class="container py-5" style="background-color: #FAFAFF">
    <div class="row">
      <div class="col-lg-3">
        <div class="card mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px'>
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="mt-3"><?= $nom . ' ' . $prenom . ', ' . Controllers\Utils::dateToAge($date_naissance) . ' ' . 'ans' ?></h5>
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
            <div class="card-body text-center">
              <h5>Emploi du temps</h5>
              <hr>
              <p class="text-muted mb-1"> Prochains rendez-vous
                <!-- a voir quand y'aura des rendez-vous-->
              </p>
              <div class="row">

                <?php


                foreach ($donneesRdv as $items) {
                  extract($items);

                ?>
                  <div class="col-4">
                    <div class="card shadow my-3" style="min-height: 7rem">
                      <div class="card-body">
                        <h5 class="card-title"><?= $id_praticien ?></h5>
                        <p class="card-text"><?= $id_prestation ?></p>
                        <p class="card-text"><?=

                                              strftime("%A %d %B %Y <br> %H h %M", strtotime($date));

                                              ?>

                        </p>
                      </div>
                    </div>
                  </div>

                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <br>
        <!-- <script src="../../assets/scripts/recherchePatient.js"></script> -->
</section>