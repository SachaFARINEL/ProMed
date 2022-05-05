<div class="input-group rounded" style="width: 200px">
    <input type="search" id="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
    <span class="input-group-text border-0" id="search-addon">
        <i class="bi bi-search"></i>
    </span>
</div>

<div id="content" style="text-align: center"></div>


<div id="listePraticiens" style="text-align: center">
    <div class="col-10">
        <div class="row">
            <?php
            foreach ($allPraticiens as $praticien) {
                extract($praticien);
                Controllers\Utils::cartes($nom, $prenom, $profession, $tel, $mail);
            }
            ?>
        </div>
    </div>

</div>

<script src="../../assets/scripts/recherchePraticien.js"></script>