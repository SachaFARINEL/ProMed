<?php
extract($dataPraticien);
extract($adressePraticien[0]);
?>
<div class="row g-5">
    <div>
        <div class="row g-3">
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace font-monospace">Nom</span>
                    <input type="text" class="form-control" name="nom" id="nom" value=<?= $nom ?>>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace font-monospace">Prénom</span>
                    <input type="text" class="form-control" name="prenom" id="prenom" value=<?= $prenom ?>>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace">Profession</span>
                    <input type="text" class="form-control" name="profession" id="profession" value=<?= $profession ?>>
                    <!-- input, praticien choisis son métier -->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace">Numéro Adélie</span>
                    <input type="text" class="form-control" name="num_adelie" id="num_adelie" value=<?= $num_adelie ?>>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace"><i class="bi bi-phone"></i></span>
                    <input type="tel" class="form-control" name="tel" id="tel" value=<?= $tel ?>>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace"><i class="bi bi-envelope-check"></i></span>
                    <input type="email" class="form-control" name="mail" id="mail" value=<?= $mail ?>>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace">Mot de passe</span>
                    <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace">Confirmation mot de passe</span>
                    <input type="password" class="form-control" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace font-monospace">Nom du cabinet</span>
                    <input type="text" class="form-control" name="nom_cabinet" id="nom_cabinet" value="<?= $nom_cabinet ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace">Numéro de voie</span>
                    <input type="text" class="form-control" name="numero" id="numero" value=<?= $numero ?>>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace">Type de voie</span>
                    <select class="form-select" name="type_de_voie" id="type_de_voie">
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
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace">Adresse</span>
                    <input type="text" class="form-control" name="adresse" id="adresse" value="<?= $adresse ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace">Code postal</span>
                    <input type="text" class="form-control" name="code_postal" id="code_postal" value=<?= $code_postal ?>>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace">Ville</span>
                    <input type="text" class="form-control" name="ville" id="ville" value=<?= $ville ?>>
                </div>
            </div>

            <div class="col-sm-6">
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
            <div class="col-sm-6">
                <div class="input-group has-validation">
                    <span class="input-group-text font-monospace">Pays</span>
                    <input type="text" class="form-control" name="pays" id="pays" value=<?= $pays ?>>
                </div>
            </div>

            <div class="py-2"></div>
            <button class="w-100 btn btn-primary btn-lg mb-2" type="submit" id="sendButton">Modifier mes informations</button>
        </div>
    </div>

    <script src="./assets/scripts/modificationProfilPraticien.js"></script>