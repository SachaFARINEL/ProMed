<div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <!-- <form action=".?controller=patient&task=auth" method="POST"> -->
            <h3 class="py-2">Authentification Patient : </h3>

            <!-- Email -->
            <div class="form-outline mb-4">
                <input type="email" name="mail" id="emailSent" class="form-control form-control-lg" placeholder="Entrez votre adresse e-mail" />

            </div>

            <!-- Password -->
            <div class="form-outline mb-3">
                <input type="password" name="mot_de_passe" id="mdpSent" class="form-control form-control-lg" placeholder="Entrez votre mot de passe" />
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" value="Valider" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">S'authentifier</button>
                </div>


                <!-- </form> -->
            </div>
        </div>
    </div>
    </section>

    <script src="./assets/scripts/authentification.js"></script>