<section class="vh-20">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form action=".?controller=praticien&task=auth" method="POST">
                    <h3 class="py-2">Formulaire Praticien : </h3>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="mail" id="form1Example13" class="form-control form-control-lg" placeholder="Entrez votre adresse e-mail" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="mot_de_passe" id="form1Example23" class="form-control form-control-lg" placeholder="Entrez votre mot de passe" />

                    </div>

                    <div class="text-center">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">S'authentifier</button>

                        <div class="divider d-flex align-items-center my-4 text-center justify-content-center">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OU</p>
                        </div>

                        <a type="button" style="background-color: #55acee" class="btn btn-primary btn-lg btn-block" a href="./?controller=praticien&task=inscription">S'inscrire</a>

                        <a type="button" style="background-color: red" class="btn btn-primary btn-lg btn-block" href="./?controller=praticien&task=showEspace">Mode dev</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>


<!-- <fieldset>
        <legend>Formulaire d' inscription praticien</legend><br>

        <label class=label2 for="nom">Nom : <span id="nom1"></span></label>
        <input type="text" id="nom" placeholder="Nom" style="width:100%" /><br>

        <label class=label2 for="prenom">Prénom : <span id="prenom1"></span></label>
        <input type="text" id="prenom" placeholder="Prénom" style="width:100%" /><br>

        <label class=label2 for="activite">Activité<span id="activite1"></span></label>
        <input type="text" id="activite" placeholder="Activité" style="width:100%" /><br>

        <label class=label2 for="adresse">Adresse<span id="adresse1"></span></label>
        <input type="text" id="adresse" placeholder="abcdef 123456 abcd" style="width:100%" /><br>

        <label class=label2 for="mail">Adresse Mail : <span id="mail1"></span></label>
        <input type="text" id="mail" placeholder="xxxxxxx@xxxx.xx" style="width:100%" /><br>

        <label class=label2 for="numero">N° Adélie <span id="numero1"></span></label>
        <input type="text" id="numero" placeholder="N° Adélie" style="width: 100%;" /><br>

        <label class=label2 for="mdp">Mot de passe <span id="mdp1"></span></label>
        <input id="mdp" placeholder="Mot de Passe" style="width: 100%;"></input>
    </fieldset>
    <div class="button">
        <button id='button' onclick="sendMe();" type="submit" style="background-color: lightblue;"><strong>Envoyer le
                message</strong></button>
        </form> -->