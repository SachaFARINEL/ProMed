<div class="input-group rounded" style="width: 200px">
    <input type="search" id="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
    <span class="input-group-text border-0" id="search-addon">
        <i class="bi bi-search"></i>
    </span>
</div>
<div id="content"></div>
<div id="listePatients">
    <?php
    // var_dump($donneesAllPatients);
    // exit;
    foreach ($donneesAllPatients as $item) {
        foreach ($item as $key => $data) {
            echo  $key . ":" . $data . "</br>";
        }
    }
    ?>
</div>


<script src="../../assets/scripts/recherchePatient.js"></script>