<link rel="stylesheet" href="assets/css/profilPraticien">
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10">
            <!-- <h1><?= $nom . ' ' . $prenom ?></h1> -->
            <br /> <br />
        </div>




        <div class="col-sm-3">
            <!--left col-->

            <div class="text-center">
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar"></br>
                </br>
                <h6>Choisissez votre photo...</h6>
                <input type="file" class="text-center center-block file-upload"></br>
            </div>


            </hr><br>




            <table>
                <div class="col-12">

                    <li class="list-group-item text-muted"><strong>Prestation</strong> </li>
                    <?php

                    foreach ($prestations as $prestation) {
                        extract($prestation);
                        echo $nom_prestation . '</br>';
                    }
                    ?>


                </div>
            </table>



        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <div class="nav nav-tabs">
                <button class="col-xs-3"><a href="./?controller=praticien&task=profilPraticien">Home</a></button>
                &nbsp;
                <button class="col-xs-3"><a href="./?controller=praticien&task=ajoutPrestation">Ajouter une prestation</a></button>
                &nbsp;
                <button class="col-xs-3"><a href="./?controller=praticien&task=modifPrestation">Modifier une prestation</a></button>
            </div>

            <form action=".?controller=Prestation&task=update" method="POST">


                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="row">

                                <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">

                                        <div class="card-body">
                                            <label for="nom_prestation">
                                                <h4>Prestation n??1</h4>
                                            </label>

                                            <input type="text" class="form-control" name="nom_prestation" id="nom_prestation" value="<?= $nom_prestation ?>" required />
                                            <input type="text" class="form-control" name="description" id="description" value="<?= $description ?>" required />
                                            <input type="text" class="form-control" name="prix" id="prix" value="<?= $prix ?>" required />
                                            <input type="checkbox" />
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">

                                        <div class="card-body">
                                            <label for="nom_prestation">
                                                <h4>Prestation n??2</h4>
                                            </label>
                                            <input type="text" class="form-control" name="nom_prestation" id="nom_prestation" value="<?= $nom_prestation ?>" required />
                                            <input type="text" class="form-control" name="nom_prestation" id="nom_prestation" value="<?= $description ?>" required />
                                            <input type="text" class="form-control" name="nom_prestation" id="nom_prestation" value="<?= $prix ?>" required />
                                            <input type="checkbox" name="choix" id="choix" value="yes" />
                                        </div>

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">
                                        <div class="card-body">


                                            <label for="nom_prestation">
                                                <h4>Prestation n??3</h4>
                                            </label>

                                            <input type="text" class="form-control" name="nom_prestation" id="nom_prestation" value="<?= $nom_prestation ?>" required />
                                            <input type="text" class="form-control" name="nom_prestation" id="nom_prestation" value="<?= $description ?>" required />
                                            <input type="text" class="form-control" name="nom_prestation" id="nom_prestation" value="<?= $prix ?>" required />
                                        </div>
                                    </div>
                                </div> -->

                            </div>




                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg" type="submit" style="text-align:center;"><i class="glyphicon glyphicon-ok-sign"></i>Supprimer</button>


                            </div>
                    </div>
            </form>
        </div>
    </div>
    </form>










    <hr>

</div>
</div>
</div>