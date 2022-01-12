<fieldset>
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
    </form>