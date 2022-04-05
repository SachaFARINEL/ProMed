    <form action='./?controller=patient&task=rechercherUnPatient' method="POST">
        <div class="input-group rounded" style="width: 200px">
            <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
                <button type='submit'><i class="bi bi-search"></i></button>
            </span>
        </div>
    </form>
    <div>
        <h1>Réponses</h1>
        <?php
        foreach ($dataPatient as $key => $value) : ?>
            <h5><?= $key ?> : <?= $value ?></h5>
        <?php endforeach ?>
    </div>

    <script src="../../assets//scripts//recherchePatient.js"></script>