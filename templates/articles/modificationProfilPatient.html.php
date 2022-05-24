<?php
extract($donneesTablePatient);
extract($donneesAdresse);
extract($donneesRdv);
?>

<link rel="stylesheet" href="assets/css/profilPraticien">
<div class="container">
    <main>
        <div class="row g-5 margin">
            <div>
                <form action=".?controller=patient&task=updateProfilPatient" method="POST">
                    <div class="row g-3">
                        <h4 class="font-monospace text-decoration-underline">Informations personnelles</h4>
                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace font-monospace">Prénom</span>
                                <input type="text" value=<?= $prenom ?> class="form-control" name="prenom" id="prenom" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace font-monospace">Nom</span>
                                <input type="text" value=<?= $nom ?> class="form-control" name="nom" id="nom" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace font-monospace">Genre</span>
                                <select class="form-select" name="genre" id="genre">
                                    <option selected=<?= $genre ?>><?= $genre ?></option>
                                    <option value="Féminin">Féminin</option>
                                    <option value="Masculin">Masculin</option>
                                    <option value="Non binaire">Non binaire</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace font-monospace">Date de naissance</span>
                                <input type="date" value=<?= $date_naissance ?> class="form-control" name="date_naissance" id="date_naissance" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Profession</span>
                                <select class="form-select" name="activite" id="activite">
                                    <option selected=<?= $activite ?>><?= $activite ?></option>
                                    <option value="Agriculteur exploitant">Agriculteur exploitant</option>
                                    <option value="Artisan, commerçant et chef d'entreprise">Artisan, commerçant et chef d'entreprise</option>
                                    <option value="Cadre et profession intellectuelle supérieure">Cadre et profession intellectuelle supérieure</option>
                                    <option value="Profession intermédiaire">Profession intermédiaire</option>
                                    <option value="Employé">Employé</option>
                                    <option value="Ouvrier">Ouvrier</option>
                                    <option value="Retraité">Retraité</option>
                                    <option value="Sans activité profesionnelle">Sans activité professionnelle</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace"><i class="bi bi-envelope-check"></i></span>
                                <input type="email" value=<?= $mail ?> class=" form-control" name="mail" id="mail" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace"><i class="bi bi-phone"></i></span>
                                <input type="tel" value=<?= $tel ?> class="form-control" name="tel" id="tel">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace font-monospace">Mot de passe</span>
                                <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Confirmation mot de passe</span>
                                <input type="password" class="form-control" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation">
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Numéro de voie</span>
                                <input type="text" value=<?= $numero ?> class="form-control" name="numero" id="numero" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Type de voie</span>
                                <select class="form-select" name="type_de_voie" id="type_de_voie" required>
                                    <option selected=<?= $type_de_voie ?>><?= $type_de_voie ?></option>
                                    <option value="Allée">Allée</option>
                                    <option value="Avenue">Avenue</option>
                                    <option value="Boulevard">Boulevard</option>
                                    <option value="Chemin">Chemin</option>
                                    <option value="Gaffe">Gaffe</option>
                                    <option value="Impasse">Impasse</option>
                                    <option value="Montée">Montée</option>
                                    <option value="Parc">Parc</option>
                                    <option value="Passage9">Passage</option>
                                    <option value="Place">Place</option>
                                    <option value="Route">Route</option>
                                    <option value="Rue">Rue</option>
                                    <option value="Ruelle">Ruelle</option>
                                    <option value="Quai">Quai</option>
                                    <option value="Square">Square</option>
                                    <option value="Autre">Autre...</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Adresse</span>
                                <input type="text" value=<?= $adresse ?> class="form-control" name="adresse" id="adresse" required>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Code postal</span>
                                <input type="text" value=<?= $code_postal ?> class="form-control" name="code_postal" id="code_postal" required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Ville</span>
                                <input type="text" value=<?= $ville ?> class="form-control" name="ville" id="ville" required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Département</span>
                                <select class="form-select" name="departement" id="departement" required>
                                    <option selected=<?= $departement ?>><?= $departement ?></option>
                                    <option value="1">1 - Ain</option>
                                    <option value="2">2 - Aisne</option>
                                    <option value="3">3 - Allier</option>
                                    <option value="4">4 - Alpes-de-Haute-Provence</option>
                                    <option value="5">5 - Hautes-Alpes</option>
                                    <option value="6">6 - Alpes-Maritimes</option>
                                    <option value="7">7 - Ardèche</option>
                                    <option value="8">8 - Ardennes</option>
                                    <option value="9">9 - Ariège</option>
                                    <option value="10">10 - Aube</option>
                                    <option value="11">11 - Aude</option>
                                    <option value="12">12 - Aveyron</option>
                                    <option value="13">13 - Bouches-du-Rhône</option>
                                    <option value="14">14 - Calvados</option>
                                    <option value="15">15 - Cantal</option>
                                    <option value="16">16 - Charente</option>
                                    <option value="17">17 - Charente-Maritime</option>
                                    <option value="18">18 - Cher</option>
                                    <option value="19">19 - Corrèze</option>
                                    <option value="21">21 - Côte-d'Or</option>
                                    <option value="22">22 - Côtes-d'Armor</option>
                                    <option value="23">23 - Creuse</option>
                                    <option value="24">24 - Dordogne</option>
                                    <option value="25">25 - Doubs</option>
                                    <option value="26">26 - Drôme</option>
                                    <option value="27">27 - Eure</option>
                                    <option value="28">28 - Eure-et-Loir</option>
                                    <option value="29">29 - Finistère</option>
                                    <option value="2A">2A - Corse-du-Sud</option>
                                    <option value="2B">2B - Haute-Corse</option>
                                    <option value="30">30 - Gard</option>
                                    <option value="31">31 - Haute-Garonne</option>
                                    <option value="32">32 - Gers</option>
                                    <option value="33">33 - Gironde</option>
                                    <option value="34">34 - Hérault</option>
                                    <option value="35">35 - Ille-et-Vilaine</option>
                                    <option value="36">36 - Indre</option>
                                    <option value="37">37 - Indre-et-Loire</option>
                                    <option value="38">38 - Isère</option>
                                    <option value="39">39 - Jura</option>
                                    <option value="40">40 - Landes</option>
                                    <option value="41">41 - Loir-et-Cher</option>
                                    <option value="42">42 - Loire</option>
                                    <option value="43">43 - Haute-Loire</option>
                                    <option value="44">44 - Loire-Atlantique</option>
                                    <option value="45">45 - Loiret</option>
                                    <option value="46">46 - Lot</option>
                                    <option value="47">47 - Lot-et-Garonne</option>
                                    <option value="48">48 - Lozère</option>
                                    <option value="49">49 - Maine-et-Loire</option>
                                    <option value="50">50 - Manche</option>
                                    <option value="51">51 - Marne</option>
                                    <option value="52">52 - Haute-Marne</option>
                                    <option value="53">53 - Mayenne</option>
                                    <option value="54">54 - Meurthe-et-Moselle</option>
                                    <option value="55">55 - Meuse</option>
                                    <option value="56">56 - Morbihan</option>
                                    <option value="57">57 - Moselle</option>
                                    <option value="58">58 - Nièvre</option>
                                    <option value="59">59 - Nord</option>
                                    <option value="60">60 - Oise</option>
                                    <option value="61">61 - Orne</option>
                                    <option value="62">62 - Pas-de-Calais</option>
                                    <option value="63">63 - Puy-de-Dôme</option>
                                    <option value="64">64 - Pyrénées-Atlantiques</option>
                                    <option value="65">65 - Hautes-Pyrénées</option>
                                    <option value="66">66 - Pyrénées-Orientales</option>
                                    <option value="67">67 - Bas-Rhin</option>
                                    <option value="68">68 - Haut-Rhin</option>
                                    <option value="69">69 - Rhône</option>
                                    <option value="70">70 - Haute-Saône</option>
                                    <option value="71">71 - Saône-et-Loire</option>
                                    <option value="72">72 - Sarthe</option>
                                    <option value="73">73 - Savoie</option>
                                    <option value="74">74 - Haute-Savoie</option>
                                    <option value="75">75 - Paris</option>
                                    <option value="76">76 - Seine-Maritime</option>
                                    <option value="77">77 - Seine-et-Marne</option>
                                    <option value="78">78 - Yvelines</option>
                                    <option value="79">79 - Deux-Sèvres</option>
                                    <option value="80">80 - Somme</option>
                                    <option value="81">81 - Tarn</option>
                                    <option value="82">82 - Tarn-et-Garonne</option>
                                    <option value="83">83 - Var</option>
                                    <option value="84">84 - Vaucluse</option>
                                    <option value="85">85 - Vendée</option>
                                    <option value="86">86 - Vienne</option>
                                    <option value="87">87 - Haute-Vienne</option>
                                    <option value="88">88 - Vosges</option>
                                    <option value="89">89 - Yonne</option>
                                    <option value="90">90 - Territoire de Belfort</option>
                                    <option value="91">91 - Essonne</option>
                                    <option value="92">92 - Hauts-de-Seine</option>
                                    <option value="93">93 - Seine-Saint-Denis</option>
                                    <option value="94">94 - Val-de-Marne</option>
                                    <option value="95">95 - Val-d'Oise</option>
                                    <option value="971">971 - Guadeloupe</option>
                                    <option value="972">972 - Martinique</option>
                                    <option value="973">973 - Guyane</option>
                                    <option value="974">974 - La Réunion</option>
                                    <option value="976">976 - Mayotte</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Pays</span>
                                <input type="text" value=<?= $pays ?> class="form-control" name="pays" id="pays" required>
                            </div>
                        </div>

                        <hr class="mt-5">

                        <h4 class="font-monospace text-decoration-underline">Données liées aux soins</h4>

                        <div class="col-sm-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Numéro de sécurité sociale</span>
                                <input type="text" value=<?= $num_secu ?> class="form-control" name="num_secu" id="num_secu" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Mutuelle</span>
                                <input type="text" value=<?= $mutuelle ?> class="form-control" name="mutuelle" id="mutuelle" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Caisse d'assurance maladie</span>
                                <input type="text" value=<?= $caisse ?> class="form-control" name="caisse" id="caisse" required>
                            </div>
                        </div>

                        <hr class="mt-5">

                        <h4 class="font-monospace">Contact du tuteur </h4>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Prénom</span>
                                <input type="text" value=<?= $prenom_tuteur ?> class="form-control" name="prenom_tuteur" id="prenom_tuteur">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Nom</span>
                                <input type="text" value=<?= $nom_tuteur ?> class="form-control" name="nom_tuteur" id="nom_tuteur">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Email</span>
                                <input type="text" value=<?= $mail_tuteur ?> class="form-control" name="mail_tuteur" id="mail_tuteur">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Téléphone</span>
                                <input type="tel" value=<?= $tel_tuteur ?> class="form-control" name="tel_tuteur" id="tel_tuteur">
                            </div>
                        </div>

                        <hr class="mt-5">

                        <h4 class="font-monospace text-decoration-underline">Contact du médecin généraliste </h4>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Prénom</span>
                                <input type="text" value=<?= $prenom_generaliste ?> class="form-control" name="prenom_generaliste" id="prenom_generaliste">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Nom</span>
                                <input type="text" value=<?= $nom_generaliste ?> class="form-control" name="nom_generaliste" id="nom_generaliste">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Email</span>
                                <input type="text" value=<?= $mail_generaliste ?> class="form-control" name="mail_generaliste" id="mail_generaliste">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group has-validation">
                                <span class="input-group-text font-monospace">Téléphone</span>
                                <input type="tel" value=<?= $tel_generaliste ?> class="form-control" name="tel_generaliste" id="tel_generaliste">
                            </div>
                        </div>

                        <hr class="mt-4 mb-4">

                    </div>

                    <button class="w-100 btn btn-primary btn-lg mb-2" type="submit">Valider les informations</button>
                </form>
            </div>
        </div>
    </main>