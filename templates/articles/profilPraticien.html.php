<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="assets/css/profilPraticien">
<?php
extract($dataPraticien);

?>
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


            <!-- <div class="panel panel-default">
                <div class="panel-heading">Prestation <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body">Médecin généraliste</div>
                <div class="panel-body">Podologue</div>
            </div> -->

            <!-- 
            <ul class="list-group">
                <li class="list-group-item text-muted"><strong>Prestation</strong> <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left">Medecin généraliste</span> </li>
                <li class="list-group-item text-right"><span class="pull-left">Podologue</span> </li>
                <li class="list-group-item text-right"><span class="pull-left">Kinésithérapeute</span> </li>
                <li class="list-group-item text-right"><span class="pull-left">Thérapeute de couple^^</span> </li>
            </ul> -->
            <div class="col-12">


                <li class="list-group-item text-muted"><strong>Prestation</strong> </li>
                <?php

                foreach ($prestations as $prestation) {
                    extract($prestation);
                    echo $nom_prestation . '</br>';
                }
                ?>

            </div>



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



            <form action=".?controller=praticien&task=update" method="POST">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="row">
                                <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">
                                        <div class="card-body">
                                            <label for="nom">
                                                <h4>Nom</h4>
                                            </label>

                                            <input type="text" class="form-control" name="nom" id="nom" value="<?= $nom ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">
                                        <div class="card-body">
                                            <label for="prenom">
                                                <h4>Prénom</h4>
                                            </label>
                                            <input type="text" class="form-control" name="prenom" id="prenom" value=<?= $prenom ?> required>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">
                                        <div class="card-body">
                                            <label for="phone">
                                                <h4>Téléphone Fixe</h4>
                                            </label>
                                            <input type="text" class="form-control" name="tel" id="tel" value=<?= $tel ?> required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">
                                        <div class="card-body">
                                            <label for="email">
                                                <h4>Email</h4>
                                            </label>
                                            <input type="email" class="form-control" name="mail" id="mail" value=<?= $mail ?> required>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">
                                        <div class="card-body">
                                            <label for="profession">
                                                <h4>Profession</h4>
                                            </label>
                                            <input type="text" class="form-control" name="profession" id="profession" value=<?= $profession ?> required>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">
                                        <div class="card-body">
                                            <label for="adresse">
                                                <h4>Nom cabinet</h4>
                                            </label>
                                            <input type="text" class="form-control" id="cabinet" value="<?= $nom_cabinet ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">
                                        <div class="card-body">
                                            <label for="num_adelie">
                                                <h4>Numéro adélie</h4>
                                            </label>
                                            <input type="text" class="form-control" name="num_adelie" id="num_adelie" value=<?= $num_adelie ?> required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">
                                        <div class="card-body">
                                            <label for="password">
                                                <h4>Mot de passe</h4>
                                            </label>
                                            <input type="password" class="form-control" name="password" id="password" value="">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card shadow my-3" style="min-height: 7rem">
                                        <div class="card-body">
                                            <label for="new_password">
                                                <h4>Nouveau mot de passe</h4>
                                            </label>
                                            <input type="password" class="form-control" name="new_password" id="new_password" value="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">

                                <div class="col-sm-6">
                                    <label for="nom">
                                        <h4>Nom</h4>
                                    </label>

                                    <input type="text" class="form-control" name="nom" id="nom" value="<?= $nom ?>" />
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <label for="prenom">
                                        <h4>Prénom</h4>
                                    </label>
                                    <input type="text" class="form-control" name="prenom" id="prenom" value=<?= $prenom ?> required>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <label for="phone">
                                        <h4>Téléphone Fixe</h4>
                                    </label>
                                    <input type="text" class="form-control" name="tel" id="tel" value=<?= $tel ?> required>
                                </div>
                            </div>
                            <div class="form-group">



                                <div class="col-sm-6">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label>
                                    <input type="email" class="form-control" name="mail" id="mail" value=<?= $mail ?> required>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <label for="profession">
                                        <h4>Profession</h4>
                                    </label>
                                    <input type="text" class="form-control" name="profession" id="profession" value=<?= $profession ?> required>
                                </div>
                            </div>
                            <div class="form-group">


                                <div class="col-sm-6">
                                    <label for="adresse">
                                        <h4>Nom cabinet</h4>
                                    </label>
                                    <input type="text" class="form-control" id="cabinet" value="<?= $nom_cabinet ?>">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <label for="num_adelie">
                                        <h4>Numéro adélie</h4>
                                    </label>
                                    <input type="text" class="form-control" name="num_adelie" id="num_adelie" value=<?= $num_adelie ?> required>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <label for="password">
                                        <h4>Mot de passe</h4>
                                    </label>
                                    <input type="password" class="form-control" name="password" id="password" value="">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="new_password">
                                        <h4>Nouveau mot de passe</h4>
                                    </label>
                                    <input type="password" class="form-control" name="new_password" id="new_password" value="">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="new_password">
                                        <h4>Comfirme ton nouveau mot de passe</h4>
                                    </label>
                                    <input type="password" class="form-control" name="password" id="password" value="">
                                </div>
                            </div>
                            <div class="form-group"> -->




                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Sauvegarder</button>
                                <button class="btn btn-lg" type="submit"><i class="glyphicon glyphicon-repeat"></i> Modifier</button>


                            </div>
                    </div>
            </form>

            <hr>

        </div>
        <!--/tab-pane-->

        <!--/tab-pane-->
        <!-- <div class="tab-pane" id="settings">


                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name">
                                        <h4>Consultation</h4>
                                    </label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Menu déroulant" title="enter your first name if any.">
                                </div>
                            </div>
 -->


        <!-- <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="mobile">
                                        <h4>Durée</h4>
                                    </label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Durée de la consultation " title="enter your mobile number if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="phone">
                                        <h4>Prix</h4>
                                    </label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Prix consultation" title="enter your phone number if any.">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="mobile">
                                        <h4>Moyens de paiement</h4>
                                    </label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Cheques, especes, cartes bancaires... " title="enter your mobile number if any.">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Description</h4>
                                    </label>
                                    <textarea type="text" class="form-control" name="last_name" id="last_name" style="height: 100px" placeholder="Description" title="enter your last name if any."></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-add " type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Ajouter</button>
                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                </div>
                            </div> 
                        </form>
                    </div> -->



    </div>
    <!--/tab-pane-->
    </form>
</div>
<!--/tab-content-->

</div>
<!--/col-9-->

</div>
<!--/row-->