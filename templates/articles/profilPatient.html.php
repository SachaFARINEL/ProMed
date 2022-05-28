<?php
extract($donneesTablePatient);
extract($donneesAdresse[0]);
extract($donneesRdv);
$controller = filter_input(INPUT_GET, 'controller');
$isMineur = intval(Controllers\Utils::dateToAge($date_naissance)) < 18;
$pathPicture = null;
$genreDate = null;

if ($genre == 'Féminin') {
  $pathPicture = './assets/images/profilPictureF.png';
  $genreDate = 'Née';
} else if ($genre == 'Masculin') {
  $pathPicture = './assets/images/profilPictureM.png';
  $genreDate = 'Né';
} else {
  $pathPicture = './assets/images/profilPictureDEFAULT.jpg';
  $genreDate = 'Né.e';
}

$dateInscr = explode(" ", $date_inscription);
$dateInscr = Controllers\Utils::dateToFrench($dateInscr[0], 'j F Y');

?>

<div style="display: flex; justify-content: center">
  <section class="col-lg-9-md-12" style="background-color: #FAFAFF">
    <div class="container pt-5" style="background-color: #FAFAFF">
      <div class="row">
        <div class="col-lg-3">
          <div class="card mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px'>

            <div class="card-body text-center">
              <div>
                <img src=<?= $pathPicture ?> alt="avatar" class="rounded-circle img-fluid" style="width: 150px">
                <?php
                if ($controller == 'patient') {
                  echo '<a href=".?controller=patient&task=afficherModificationProfilPatient"><img class="parametresFiche" style="width : 15% ; position: absolute" src=./assets/images/parametres.png></a>';
                }
                ?>
              </div>
              <h5 class="mt-3"><?= $nom . ' ' . $prenom . ', ' . Controllers\Utils::dateToAge($date_naissance) . ' ' . 'ans' ?></h5>
              <p class="text-muted mb-1"> <?= $genreDate . ' ' . 'le' . ' ' . Controllers\Utils::dateToFrench($date_naissance, 'j F Y') ?>
                <hr>
              <p class="text-muted mb-1"><?= $numero . ' ' . ($type_de_voie === 'Autre' ? ' ' : $type_de_voie) . ' ' . $adresse . ', ' . $code_postal . ' ' . $ville  ?></p>

              <p class="text-muted mb-1"><?= $out = Controllers\Utils::espaceTelephone($tel) ?></p>
              <p class="text-muted mb-3"><?= $mail ?></p>
              <p class="text-muted mb-1"><?= $activite ?></p>
              <p class="text-muted mb-3">Inscrit le <?= $dateInscr ?></p>

            </div>
          </div>
          <?php
          if ($isMineur) {
          ?>
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
          <?php
          }
          ?>

        </div>

        <div class="col-sm-9">


          <!-- <button class="col-xs-3">
            <a href="/?controller=patient&task=AfficherUpdatePatient">Modifier informations</a>
            &nbsp;
          </button> -->


          <div class="col-lg-8" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px">
            <div class="card mb-4 font-monospace">
              <div class="card-body">
                <div class="row">
                  <h5 style='text-align: center'>Médecin généraliste <img style='width: 5.9%; margin-left: 2rem' src='./assets/images/doctor.png'></h5>
                  <hr>
                  <div class="col-sm-3">
                    <p class="mb-2">Nom Prénom</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted"><?= $prenom_generaliste . ' ' . $nom_generaliste ?></p>
                  </div>
                </div>


                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-2">Adresse Mail</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted"><?= $mail_generaliste ?></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-2">N° de mobile</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted"><?= Controllers\Utils::espaceTelephone($tel_generaliste) ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <?php
          if ($isMineur) {
          ?>
            <div class="col-lg-8 font-monospace" style="margin-bottom: 2.2rem ; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <h5 style='text-align: center'>Tuteur du Patient</h5>
                    <hr>
                    <div class="col-sm-3">
                      <p class="mb-2 font-monospace">Nom Prénom</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted"><?= $prenom_tuteur . ' ' . $nom_tuteur ?></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-2">Adresse Mail</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted"><?= $mail_tuteur ?></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-2">N° de mobile</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted"><?= Controllers\Utils::espaceTelephone($tel_tuteur) ?></p>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          <?php
          }
          ?>

          <div class="col-lg-8 font-monospace" style="margin-bottom: 2.2rem ; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <h5 style='text-align: center'>Quelques chiffres <img style='width: 5.8%; margin-left: 2rem' src='./assets/images/medal.png'></h5>
                  <hr>
                  <div class="col-sm-8">
                    <p class="mb-2 font-monospace">Rendez-vous pris</p>
                  </div>
                  <div class="col-sm-4">
                    <p class="text-muted"><?= $dataOnRdv[0]['COUNT(*)'] ?></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-8">
                    <p class="mb-2">Praticiens différents consultés</p>
                  </div>
                  <div class="col-sm-4">
                    <p class="text-muted"><?= $dataOnRdv[1]['COUNT(DISTINCT id_praticien)'] ?></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-8">
                    <p class="mb-2">Prestations unique</p>
                  </div>
                  <div class="col-sm-4 mb-2">
                    <p class="text-muted"><?= $dataOnRdv[2]['COUNT(DISTINCT id_prestation)'] ?></p>
                  </div>
                </div>

              </div>
            </div>
          </div>


        </div>
      </div>
      <?php
      if (!$isMineur) {
      ?>

        <div class="card col-9 mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px'>
          <div class="card-body text-center">
            <h5>Données liées aux soins</h5>
            <hr>
            <p class="text-muted mb-1">Numéro de sécurité sociale : <strong><?= $num_secu ?></strong>
            </p>
            <p class="text-muted mb-1">
              Mutuelle :<strong> <?= $mutuelle ?></strong>
            </p>
            <p class="text-muted mb-3">Caisse d'assurance maladie : <strong><?= $caisse ?></strong>
            </p>
          </div>
        </div>

      <?php
      }
      ?>
    </div>


  </section>
</div>
<?php
