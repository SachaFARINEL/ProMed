    <form action='./?controller=praticien&task=rechercherUnPraticien' method="POST">
        <div style="border:solid" class="col-sm-3">
            <div class="input-group">
                <div id="navbar-search-autocomplete" class="input-group rounded" style="width: 100%">
                    <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <button type='submit'><i class="bi bi-search"></i></button>
                    </span>
                </div>
            </div>
            <div>
                <?php
                if (isset($dataPraticien)) {
                    for ($i = 0; $i < count($dataPraticien); $i++) {
                        echo $dataPraticien[$i]['nom'] . "&nbsp" . $dataPraticien[$i]['prenom'] . "<br/>";
                    }
                }
                ?>
            </div>
        </div>
    </form>
    <script src="../../assets/scripts/recherchePraticien.js"></script>