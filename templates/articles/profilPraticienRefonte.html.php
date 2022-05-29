<?php
extract($dataPraticien);
extract($prestations);
extract($adressePraticien[0]);

// var_dump($dataPraticien);
// var_dump($prestations);
// var_dump($adressePraticien[0]);


?>
<div class="col-12 mt-5" style="display: flex; justify-content: center">
    <div class="col-lg-3">
        <div class="card mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; margin-right: 0.5rem; height: 37rem'>
            <div class="card-body text-center">
                <div>
                    <img src="./assets/images/doctor.svg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px">
                    <a href=".?controller=praticien&task=afficherModificationProfilPraticien"><img class="parametresFiche" style="width : 10% ; position: absolute" src=./assets/images/parametres.png></a>
                </div>
                <h4 class="mt-3"><?= $nom . ' ' . $prenom ?></h4>
                <h5 class="mt-3"><?= $profession ?></h5>
                <hr>
                <p class="mt-3 text-muted mb-1"><?= $mail ?></p>
                <p class="mt-3 text-muted mb-1"><?= $tel ?></p>
                <p class="mt-3 text-muted mb-1">Numéro Adélie : <?= $num_adelie ?></p>
                <hr>
                <h5 class="mt-3">Adresse du cabinet</h5>
                <p class="mt-3 text-muted mb-1"><?= $nom_cabinet ?></p>
                <p class="mt-3 text-muted mb-1"><?= $numero . ' ' . $type_de_voie . ' ' . $adresse  ?></p>
                <p class="mt-3 text-muted mb-1"><?= $code_postal . ', ' . $ville ?></p>

            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px ; margin-left: 0.5rem; height: 37rem '>
            <div class="card-body font-monospace" style="overflow-y: auto">
                <h4 class="mt-3" style="display: flex; justify-content: space-between">Mes prestations <img src="./assets/images/add.png" alt="avatar" class="parametresFiche rounded-circle img-fluid" id="addPresta" style="width: 8%"></h4>
                <hr>
                <div id="containerPresta">
                    <div class="divAddPresta mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; background: #FAFAFF'></div>
                    <?php
                    foreach ($prestations as $prestation) {
                        extract($prestation);
                    ?>
                        <div class="mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; background: #FAFAFF'>
                            <div style="padding: 1rem" class="boxPresta" id="presta-<?= $prestation['id'] ?>">
                                <h6>
                                    <span class="text-muted" style="text-decoration: underline"> Libelle</span> :
                                    <span id="libelle-<?= $prestation['id'] ?>"><?= $nom_prestation ?></span>
                                    <img src="./assets/images/editPresta.png" alt="avatar" id="imgPresta-<?= $prestation['id'] ?>" class="editPresta img-fluid" style="width: 5%">
                                    <img src="./assets/images/deletePresta.png" alt="avatar" id="deletePresta-<?= $prestation['id'] ?>" class="deletePresta img-fluid" style="width: 5%">
                                </h6>
                                <h6>
                                    <span class="text-muted" style="text-decoration: underline"> Prix</span> :
                                    <span id="prix-<?= $prestation['id'] ?>"><?= $prix ?></span> €
                                </h6>
                                <h6>
                                    <span class="text-muted" style="text-decoration: underline"> Description</span> :
                                    <span id="description-<?= $prestation['id'] ?>"><?= $description ?></span>
                                </h6>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <h1 id="test"></h1>

    <script src="./assets/scripts/modificationProfilPraticien.js"></script>