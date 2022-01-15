<form action="http://promed/?action=inscriptionPatient" method="POST">
    <fieldset>

        <!-- Nom du formulaire -->
        <legend>à remplir afin de créer le compte d'un patient</legend>
        <br>

        <!-- Nom -->

        <div class="form-example">
            <label for="nom"> Nom : </label>
            <input type="text" name="nom" id="nom" required>
        </div>

        <!-- Prénom -->

        <div class="form-example">
            <label for="prenom"> Prénom : </label>
            <input type="text" name="prenom" id="prenom" required>
        </div>

        <!-- Adresse e-mail -->

        <div class="form-example">
            <label for="email"> Adresse e-mail : </label>
            <input type="email" name="mail" id="email" required>
        </div>

        <!-- Numéro de téléphone -->

        <div class="form-example">
            <label for="telephone"> Numéro de téléphone : </label>
            <input type="tel" name="tel" id="tel" required>
        </div>

        <!-- Mot de passe -->

        <div class="form-example">
            <label for="mot de passe"> Mot de passe : </label>
            <input type="text" name="mot_de_passe" id="mot_de_passe" required>
        </div>

        <!-- Activité du patient -->

        <div class="form-example">
            <label for="activité"> Activité : </label>
            <input type="text" name="activite" id="activite" required>
        </div>

        <!-- Numéro de sécurité sociale -->

        <div class="form-example">
            <label for="numéro de sécu"> Numéro de sécurité sociale : </label>
            <input type="text" name="num_secu" id="num_secu" required>
        </div>

        <!-- Nom de la mutuelle -->

        <div class="form-example">
            <label for="numéro de mutuelle"> Mutuelle : </label>
            <input type="text" name="mutuelle" id="mutuelle" required>
        </div>

        <!-- Nom de la caisse -->

        <div class="form-example">
            <label for="Caisse"> Caisse : </label>
            <input type="text" name="caisse" id="caisse" required>
        </div>

        <!-- Date de naissance -->

        <div class="form-example">
            <label for="date de naissance"> Date de naissance : </label>
            <input type="date" name="date_naissance" id="date_naissance" required>
        </div>

        <!-- Sexe -->

        <div class="form-example">
            <label for="mot de passe"> Sexe : </label>
            <input type="radio" name="sexe" value="m" /> Homme

            <input type="radio" name="sexe" value="f" /> Femme
        </div>

        <!-- Nom du tuteur -->

        <div class="form-example">
            <label for="mot de passe"> Nom du tuteur : </label>
            <input type="text" name="nom_tuteur" id="nom_tuteur">
        </div>

        <!-- Prenom du tuteur -->

        <div class="form-example">
            <label for="mot de passe"> Prenom du tuteur : </label>
            <input type="text" name="prenom_tuteur" id="prenom_tuteur">
        </div>

        <!-- Mail du tuteur -->

        <div class="form-example">
            <label for="mot de passe"> Mail du tuteur : </label>
            <input type="email" name="mail_tuteur" id="mail_tuteur">
        </div>

        <!-- Numéro de téléphone du tuteur -->

        <div class="form-example">
            <label for="mot de passe"> Numéro de téléphone du tuteur : </label>
            <input type="tel" name="tel_tuteur" id="tel_tuteur">
        </div>

        <!-- Nom du médecin généraliste -->

        <div class="form-example">
            <label for="nom_generaliste"> Nom du médecin généraliste : </label>
            <input type="text" name="nom_generaliste" id="nom_generaliste">
        </div>

        <!-- Prénom du médecin généraliste  -->

        <div class="form-example">
            <label for="prenom_generaliste"> Prénom du médecin généraliste : </label>
            <input type="text" name="prenom_generaliste" id="prenom_generaliste">
        </div>

        <!-- Mail du médecin généraliste -->

        <div class="form-example">
            <label for="mail_generaliste"> Mail du médecin généraliste : </label>
            <input type="email" name="mail_generaliste" id="mail_generaliste">
        </div>

        <!-- Numéro de téléphone du médecin généraliste  -->

        <div class="form-example">
            <label for="tel_generaliste"> Numéro de téléphone du médecin généraliste : </label>
            <input type="tel" name="tel_generaliste" id="tel_generaliste">
        </div>



        <div class="form-example">
            <input type="submit" value="Subscribe!">
        </div>




    </fieldset>
</form>