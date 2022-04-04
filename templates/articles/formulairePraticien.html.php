<div class="container">
    <h1 class="mb-5 py-3 text-center border border-dark rounded font-monospace col-sm-6">Création de la fiche praticien</h1>
    <main>
        <div class="row g-5">
            <div>
                <form action=".?controller=praticien&task=save" method="POST">
                    <div class="row g-3">
                        <h4 class="font-monospace text-decoration-underline">Informations personnelles</h4>
                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace font-monospace">Nom</span>
                                <input type="text" class="form-control" name="nom" id="nom" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace font-monospace">Prénom</span>
                                <input type="text" class="form-control" name="prenom" id="prenom" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Profession</span>
                                <input type="text" class="form-control" name="profession" id="profession">
                                <!-- input, praticien choisis son métier -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Numéro Adélie</span>
                                <input type="text" class="form-control" name="num_adelie" id="num_adelie" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace font-monospace">Nom du cabinet</span>
                                <input type="text" class="form-control" name="nom_cabinet" id="nom_cabinet" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace"><i class="bi bi-envelope-check"></i></span>
                                <input type="email" class="form-control" name="mail" id="mail" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Mot de passe</span>
                                <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace"><i class="bi bi-phone"></i></span>
                                <input type="tel" class="form-control" name="tel" id="tel">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Confirmation mot de passe</span>
                                <input type="password" class="form-control" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation" required>
                            </div>
                        </div>
                        <button class="w-100 btn btn-primary btn-lg mb-2" type="submit">Valider les informations</button>
                </form>
            </div>
        </div>
    </main>
</div>