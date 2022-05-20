<link rel="stylesheet" href="../../assets//css/prestationPraticien.css" type="text/css">

<p><a href="./?controller=praticien&task=showEspace">Retour </a></p>

<?php
foreach ($donnesPraticien as $key => $value) : ?>
  <h5><?= $key ?> : <?= $value ?></h5>
<?php endforeach ?>


<form action=".?controller=prestation&task=addPrestation" method="POST">
  <div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card px-1 py-4">
      <div class="card-body">
        <h6 class="card-title mb-3">Configuration des prestations</h6>
        <div class="d-flex flex-row">
          <label id="buttonAjouter" class="radio mr-1">
            <input type="radio" name="add" value="anz" checked>
            <span> <i class="fa fa-user"></i>Ajouter</span>
          </label>
          <label id="buttonConsulterModifier" class="radio">
            <input type="radio" name="add" value="add">
            <span> <i class="fa fa-plus-circle"></i>Consulter/Modifier
            </span>
          </label>
        </div>
        <h6 class="information mt-4">Veuillez remplir les champs suivants :</h6>

        <div class="row" id='ajouter'>
          <div class="col-sm-12">
            <div class="form-group">
              <!-- <label for="name">Name</label> -->
              <input class="form-control" type="text" name='nom' placeholder="Consultation">

              <textarea class="form-control" name='description' style="height: 100px" placeholder="Description"></textarea>

              <input class="form-control" type="text" name='prix' placeholder="Prix">

              <input class="form-control" type="text" name='duree' placeholder="Durée">
            </div>
          </div>
        </div>


        <div class="row" id='modifier'>
          <div class="col-sm-12">
            <div class="form-group">
              <!-- <label for="name">Name</label> -->

              <?php
              for ($i = 0; $i < count($donnesPrestations); $i++) {
                echo "<div style='border: 1px solid black'>";
                foreach ($donnesPrestations[$i] as $key => $value) {
                  echo $key . " : " . "<input type='text' class='form-control' name=" . $key . " value=" . $value . ">";
                }
                echo "</div>";
              }
              ?>


            </div>
          </div>
        </div>

      </div>
      <button class="btn btn-primary btn-block confirm-button" type="submit">Confirmer</button>
    </div>
  </div>
</form>
<!-- <script src="./assets/scripts/prestations.js"></script> -->