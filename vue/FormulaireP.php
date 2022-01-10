<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            width: 50%;
            text-align: center;
            margin: auto;
        }

        button {
            margin: auto;

        }
    </style>
</head>

<body>

    <form id=form>
        <fieldset>
            <legend>Formulaire d'inscription praticien</legend><br>

            <label class=label2 for="nom">Nom : <span id="nom1"></span></label>
            <input type="text" id="nom" placeholder="Nom" style="width:100%" /><br>

            <label class=label2 for="prenom">Prénom : <span id="prenom1"></span></label>
            <input type="text" id="prenom" placeholder="Prénom" style="width:100%" /><br>

            <label class=label2 for="activite">Activité<span id="activite1"></span></label>
            <input type="text" id="activite" placeholder="Activité" style="width:100%" /><br>

            <label class=label2 for="adresse">Adresse<span id="Mail1"></span></label>
            <input type="text" id="adresse" placeholder="abcdef 123456 abcd" style="width:100%" /><br>

            <label class=label2 for="mail">Adresse Mail : <span id="Mail1"></span></label>
            <input type="text" id="Mail" placeholder="xxxxxxx@xxxx.xx" style="width:100%" /><br>

            <label class=label2 for="numero">N° Adélie <span id="objet1"></span></label>
            <input type="text" id="numero" placeholder="N° Adélie" style="width: 100%;" /><br>

            <label class=label2 for="mdp">Mot de passe <span id="mdp1"></span></label>
            <input id="mdp" placeholder="Mot de Passe" style="width: 100%;"></input>
        </fieldset>
        <div class="button">
            <button id='button' onclick="sendMe();" type="submit" style="background-color: lightblue;"><strong>Envoyer le
                    message</strong></button>
    </form>


    </div>
</body>

</html>