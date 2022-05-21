<div class="container col-6">
    <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif;height: 80vh; overflow-y: auto; overflow-x: hidden; display: flex; flex-direction: column; align-items: center">
        <h2 class="mesRdv fs-4" style="text-align: center">Vos prochains rendez-vous</h2>
        <?php
        // var_dump($allDataRDV);
        // exit;

        foreach ($rdvAVenir as $items) {
            extract($items);

        ?>
            <div class="col-10">
                <div class="card  my-1" style="min-height: 6rem">
                    <div class="card-body" style="display: flex; flex-direction : column; text-align: center; background: #FAFAFF">
                        <h5 class="card-title">
                            <bold style="font-weight: 600"><?= strtoupper($nom) . ' ' . $prenom . ', ' . $profession ?></bold>
                        </h5>
                        <p class="card-text">Pour : <?= $nom_prestation ?></p>
                        <p class="card-text">Le <?= strftime("%A %d %B %Y à %H h %M", strtotime($date)) ?>

                        </p>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>

    </div>

</div>


<div class="container col-6">
    <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif;height: 80vh; overflow-y: auto; overflow-x: hidden; display: flex; flex-direction: column; align-items: center">
        <h2 class="mesRdv fs-4" style="text-align: center">Historiques de mes rendez-vous</h2>


        <?php
        // var_dump($allDataRDV);
        // exit;

        foreach ($rdvPasses as $items) {
            extract($items);
            // var_dump($rdvPasses);
            // exit;

        ?>
            <div class="col-10">
                <div class="card  my-1" style="min-height: 6rem">
                    <div class="card-body" style="display: flex; flex-direction : column; text-align: center; background: #FAFAFF">
                        <h5 class="card-title">
                            <bold style="font-weight: 600"><?= strtoupper($nom) . ' ' . $prenom . ', ' . $profession ?></bold>
                        </h5>
                        <p class="card-text">Pour : <?= $nom_prestation ?></p>
                        <p class="card-text">Le <?= strftime("%A %d %B %Y à %H h %M", strtotime($date)) ?>

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