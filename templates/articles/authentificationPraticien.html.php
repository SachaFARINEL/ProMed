<section class="vh-20">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="assets/images/draw2.svg" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <!-- <form action=".?controller=praticien&task=auth" method="POST"> -->
                <h3 class="py-2">Authentification Praticien : </h3>
                <div class="form-outline mb-4">
                    <input type="email" name="mail" id="emailSent" class="form-control form-control-lg" placeholder="Entrez votre adresse e-mail" />
                </div>
                <div class="form-outline mb-4">
                    <input type="password" name="mot_de_passe" id="mdpSent" class="form-control form-control-lg" placeholder="Entrez votre mot de passe" />
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">S'authentifier</button>
                    <div class="divider d-flex align-items-center my-4 text-center justify-content-center">
                        <p class="text-center fw-bold mx-3 mb-0 text-muted">OU</p>
                    </div>
                    <a type="button" style="background-color: #55acee" class="btn btn-primary btn-lg btn-block" a href="./?controller=praticien&task=inscription">S'inscrire</a>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</section>
<script src="./assets/scripts/authentification.js"></script>