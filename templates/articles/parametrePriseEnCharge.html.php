<link rel="stylesheet" href="../../assets//css//styles.css" type="text/css">

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
        <div class="d-flex flex-row"> <label class="radio mr-1">
            <input type="radio" name="add" value="anz" checked> <span> <i class="fa fa-user"></i> Consulter/Modifier </span> </label>
          <label class="radio"> <input type="radio" name="add" value="add">
            <span> <i class="fa fa-plus-circle"></i> Ajouter </span> </label>
        </div>
        <h6 class="information mt-4">Veuillez remplir les champs suivants :</h6>
        <div class="row">
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
      </div>
    </div>

    <button class="btn btn-primary btn-block confirm-button" type="submit">Confirmer</button>
  </div>
  </div>
  </div>
</form>