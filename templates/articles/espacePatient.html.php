<div class="row">
    <div class="main col-12">
        <div class="container">
            <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif">
                <h2 class="mesRdv fs-4">Vos prochains rendez-vous</h2>
                <div class="row">
                    <?php
                    // var_dump($allDataRDV);
                    // exit;

                    foreach ($rdvAVenir as $items) {
                        extract($items);

                    ?>
                        <div class="col-4">
                            <div class="card  my-1" style="min-height: 6rem">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $nom ?></h5>
                                    <p class="card-text"><?= $nom_prestation ?></p>
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

        <div class="container">
            <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif">
                <h2 class="mesRdv fs-4">Historiques de mes rendez-vous</h2>
                <div class="row">

                    <?php
                    // var_dump($allDataRDV);
                    // exit;

                    foreach ($rdvPasses as $items) {
                        extract($items);

                    ?>
                        <div class="col-4">
                            <div class="card  my-1" style="min-height: 6rem">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $nom ?></h5>
                                    <p class="card-text"><?= $nom_prestation ?></p>
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

</div>