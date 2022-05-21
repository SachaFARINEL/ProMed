<div class="container col-4">
    <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif;height: 80vh; overflow-y: auto; overflow-x: hidden; display: flex; flex-direction: column; align-items: center">
        <h2 class="mesRdv fs-4" style="text-align: center">Mes rendez-vous de la journée</h2>

        <?php
        $compteur = 0;
        foreach ($rdvToday as $items) {
            extract($items);
            $compteur++;
        ?>
            <div class="col-10">
                <div class="card  my-1" style="min-height: 6rem">
                    <?php
                    if (Controllers\Utils::isRDVAnnule($isAnnule)) {
                    ?>
                        <div class="card-body" style="display: flex; flex-direction : column; text-align: center; background: rgba(232, 137, 158, 0.2)">
                        <?php
                    } else {
                        ?>
                            <div class="card-body" id="card<?= $compteur ?>" style="display: flex; flex-direction : column; text-align: center; background: #FAFAFF">
                            <?php
                        }
                            ?>
                            <h5 class="card-title">
                                <bold style="font-weight: 600"><?= strtoupper($nom) . ' ' . $prenom . ', ' . $profession ?></bold>
                            </h5>
                            <p class="card-text">Pour : <?= $nom_prestation ?></p>
                            <p class="card-text">Le <?= strftime("%A %d %B %Y à %H h %M", strtotime($date)) ?></p>
                            <?php
                            if (Controllers\Utils::isRDVAnnule($isAnnule)) {
                            ?>
                                <p><span> Le rendez-vous est annulé <img style="width:3%; margin-left: 0.2rem" src="./assets/images/close.png" </span></p>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                </div>
            <?php
        }
            ?>
            </div>
    </div>

    <div class="container col-4">
        <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif;height: 80vh; overflow-y: auto; overflow-x: hidden; display: flex; flex-direction: column; align-items: center">
            <h2 class="mesRdv fs-4" style="text-align: center">Mes prochains rendez-vous</h2>
            <?php
            $compteur = 0;
            foreach ($rdvAVenir as $items) {
                extract($items);
                $compteur++;
            ?>
                <div class="col-10">
                    <div class="card  my-1" style="min-height: 6rem">
                        <?php
                        if (Controllers\Utils::isRDVAnnule($isAnnule)) {
                        ?>
                            <div class="card-body" style="display: flex; flex-direction : column; text-align: center; background: rgba(232, 137, 158, 0.2)">
                            <?php
                        } else {
                            ?>
                                <div class="card-body" id="card<?= $compteur ?>" style="display: flex; flex-direction : column; text-align: center; background: #FAFAFF">
                                <?php
                            }
                                ?>
                                <h5 class="card-title">
                                    <bold style="font-weight: 600"><?= strtoupper($nom) . ' ' . $prenom . ', ' . $profession ?></bold>
                                </h5>
                                <p class="card-text">Pour : <?= $nom_prestation ?></p>
                                <p class="card-text">Le <?= strftime("%A %d %B %Y à %H h %M", strtotime($date)) ?></p>
                                <?php
                                if (Controllers\Utils::isRDVAnnule($isAnnule)) {
                                ?>
                                    <p><span> Le rendez-vous est annulé <img style="width:3%; margin-left: 0.2rem" src="./assets/images/close.png" </span></p>
                                <?php
                                }
                                ?>

                                </div>
                            </div>
                    </div>
                <?php
            }
                ?>
                </div>
        </div>

        <div class="container col-4">
            <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif;height: 80vh; overflow-y: auto; overflow-x: hidden; display: flex; flex-direction: column; align-items: center">
                <h2 class="mesRdv fs-4" style="text-align: center">Historiques de mes rendez-vous</h2>
                <?php
                $compteur = 0;
                foreach ($rdvPasses as $items) {
                    extract($items);
                    $compteur++;

                ?>
                    <div class="col-10">
                        <div class="card  my-1" style="min-height: 6rem">
                            <?php
                            if (Controllers\Utils::isRDVAnnule($isAnnule)) {
                            ?>
                                <div class="card-body" style="display: flex; flex-direction : column; text-align: center; background: rgba(232, 137, 158, 0.2)">
                                <?php
                            } else {
                                ?>
                                    <div class="card-body" id="card<?= $compteur ?>" style="display: flex; flex-direction : column; text-align: center; background: #FAFAFF">
                                    <?php
                                }
                                    ?>
                                    <h5 class="card-title">
                                        <bold style="font-weight: 600"><?= strtoupper($nom) . ' ' . $prenom . ', ' . $profession ?></bold>
                                    </h5>
                                    <p class="card-text">Pour : <?= $nom_prestation ?></p>
                                    <p class="card-text">Le <?= strftime("%A %d %B %Y à %H h %M", strtotime($date)) ?></p>
                                    <?php
                                    if (Controllers\Utils::isRDVAnnule($isAnnule)) {
                                    ?>
                                        <p><span> Le rendez-vous est annulé <img style="width:3%; margin-left: 0.2rem" src="./assets/images/close.png" </span></p>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                        </div>
                    <?php
                }
                    ?>
                    </div>
            </div>

            <!-- Rechercher un praticien + AJAX -->
            <script src="./assets/scripts/annulationRDV.js"></script>