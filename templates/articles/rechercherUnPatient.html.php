<div class="container d-flex justify-content-center  my-5">
    <div class="input-group rounded" style="width: 30vw">
        <input type="search" id="search" class="form-control rounded" placeholder="Rechercher un patient" aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
            <i class="bi bi-search"></i>
        </span>
    </div>
</div>

<div id="content" style="text-align: center"></div>


<div id="listePatients" style="text-align: center">
    <div class="col-10">
        <div class="row">
            <?php
            foreach ($informationsPatients as $informationsPatient) {
                foreach ($informationsPatient as $data) {
                    extract($data);
                    Controllers\Utils::cartes($id, $nom, $prenom, $tel, $mail, $profession = "", $numero, $type_de_voie, $adresse, $code_postal, $ville);
                }
            }
            ?>
        </div>
    </div>

</div>