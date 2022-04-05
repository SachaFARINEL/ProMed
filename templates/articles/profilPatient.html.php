<p><a href="./?controller=patient&task=showAuth">Retour </a></p>
<?php

// Pour le dev

foreach ($donnesTablePatient as $key => $value) {
  echo '<h5>' . $key . ' ' . ':' . ' ' . $value . '</h5>';
}

echo 'Changement de table';

foreach ($donnesAdresse as $key => $value) {
  echo '<h5>' . $key . ' ' . ':' . ' ' . $value . '</h5>';
}
?>
Ou autre manière :

<?php
extract($donnesTablePatient);
extract($donnesAdresse); ?>
<!-- Pour savoir si qu'il y a dans $donnesTablePatient -> var_dump($donnesTablePatient) -->
<h5> <?= $id ?> </h5>
<h5> <?= $nom ?> </h5>
<h5> <?= $prenom ?> </h5>

<!-- etc ... -->
<!-- Modal HTML embedded directly into document -->
<div id="ex1" class="modal">
  <p>Thanks for clicking. That felt good.</p>
  <a href="#" rel="modal:close">Close</a>
</div>

<!-- Link to open the modal -->
<p><a href="#ex1" rel="modal:open">Open Modal</a></p>


<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-3">
        <div class="card mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px'>
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="mt-3"><?= $nom . ' ' . $prenom . ', ' . Controllers\Utils::dateToAge($date_naissance) . ' ' . 'ans' ?></h5>
            <p class="text-muted mb-1"> <?= ($genre === 'Masculin' ? 'Né' : 'Née') . ' ' . 'le' . ' ' . Controllers\Utils::dateToFrench($date_naissance, 'j F Y') ?>
              <hr>
            <p class="text-muted mb-1"><?= $numero . ' ' . $type_de_voie . ' ' . $adresse . ', ' . $code_postal . ' ' . $ville  ?></p>
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
              <h5>Test tuteur</h5>
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
            <!--hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Téléphone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">(???) requete</p>
                </div>
                </div!-->
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
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                  <!--<?= $numero_tuteur ?> . ' ' . $adresse_tuteur . ' ' .  $ville_tuteur . ' ' . $code_postal_tuteur ?></p> !-->
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">RDV passé</span></p>
                <p class="mb-1" style="font-size: .77rem;">Medecin Généraliste
                  <!-- test à changer plus tard!-->
                </p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Médecin Généraliste
                  <!-- test à changer plus tard!-->
                </p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Kinésithérapeute
                  <!-- test à changer plus tard!-->
                </p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Kinésithérapeute
                  <!-- test à changer plus tard!-->
                </p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Médecin Généraliste
                  <!-- test à changer plus tard!-->
                </p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">RDV à venir</span>
                  <!--Project Status!-->
                </p>
                <p class="mb-1" style="font-size: .77rem;">Médecin Généraliste
                  <!-- test à changer plus tard!-->
                </p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Pneumologue
                  <!-- test à changer plus tard!-->
                </p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Allergologue
                  <!-- test à changer plus tard!-->
                </p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Kiné
                  <!-- test à changer plus tard!-->
                </p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Cardiologue
                  <!-- test à changer plus tard!-->
                </p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>