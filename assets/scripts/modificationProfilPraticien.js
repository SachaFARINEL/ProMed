$(function () {

    $('#sendButton').on('click', function () {

        nom = $('#nom').val();
        prenom = $('#prenom').val();
        profession = $('#profession').val();
        num_adelie = $('#num_adelie').val();
        tel = $('#tel').val();
        mail = $('#mail').val();
        mot_de_passe = $('#mot_de_passe').val();
        mot_de_passe_confirmation = $('#mot_de_passe_confirmation').val();
        nom_cabinet = $('#nom_cabinet').val();
        numero = $('#numero').val();
        type_de_voie = $('#type_de_voie').val();
        adresse = $('#adresse').val();
        code_postal = $('#code_postal').val();
        ville = $('#ville').val();
        departement = $('#departement').val();
        pays = $('#pays').val();

        function allFieldsComplete() {

            isNotEmpty = true;
            if (nom === "") {
                isNotEmpty = false;
                $('#nom').css({ 'border': '1px solid red' })
            } else {
                $('#nom').css({ 'border': '1px solid #ced4da' });
            }
            if (prenom === "") {
                isNotEmpty = false;
                $('#prenom').css({ 'border': '1px solid red' })
            } else {
                $('#prenom').css({ 'border': '1px solid #ced4da' });
            }
            if (profession === "") {
                isNotEmpty = false;
                $('#profession').css({ 'border': '1px solid red' })
            } else {
                $('#profession').css({ 'border': '1px solid #ced4da' });
            }
            if (num_adelie === "") {
                isNotEmpty = false;
                $('#num_adelie').css({ 'border': '1px solid red' })
            } else {
                $('#num_adelie').css({ 'border': '1px solid #ced4da' });
            }
            if (tel === "") {
                isNotEmpty = false;
                $('#tel').css({ 'border': '1px solid red' })
            } else {
                $('#tel').css({ 'border': '1px solid #ced4da' });
            }
            if (mail === "") {
                isNotEmpty = false;
                $('#mail').css({ 'border': '1px solid red' })
            } else {
                $('#mail').css({ 'border': '1px solid #ced4da' });
            }
            if (nom_cabinet === "") {
                isNotEmpty = false;
                $('#nom_cabinet').css({ 'border': '1px solid red' })
            } else {
                $('#nom_cabinet').css({ 'border': '1px solid #ced4da' });
            }
            if (numero === "") {
                isNotEmpty = false;
                $('#numero').css({ 'border': '1px solid red' })
            } else {
                $('#numero').css({ 'border': '1px solid #ced4da' });
            }
            if (type_de_voie === "") {
                isNotEmpty = false;
                $('#type_de_voie').css({ 'border': '1px solid red' })
            } else {
                $('#type_de_voie').css({ 'border': '1px solid #ced4da' });
            }
            if (adresse === "") {
                isNotEmpty = false;
                $('#adresse').css({ 'border': '1px solid red' })
            } else {
                $('#adresse').css({ 'border': '1px solid #ced4da' });
            }
            if (code_postal === "") {
                isNotEmpty = false;
                $('#code_postal').css({ 'border': '1px solid red' })
            } else {
                $('#code_postal').css({ 'border': '1px solid #ced4da' });
            }
            if (ville === "") {
                isNotEmpty = false;
                $('#ville').css({ 'border': '1px solid red' })
            } else {
                $('#ville').css({ 'border': '1px solid #ced4da' });
            }
            if (departement === "") {
                isNotEmpty = false;
                $('#departement').css({ 'border': '1px solid red' })
            } else {
                $('#departement').css({ 'border': '1px solid #ced4da' });
            }
            if (pays === "") {
                isNotEmpty = false;
                $('#pays').css({ 'border': '1px solid red' })
            } else {
                $('#pays').css({ 'border': '1px solid #ced4da' });
            }
            return isNotEmpty;
        }

        function champMdpVide() {
            return mot_de_passe === "" && mot_de_passe_confirmation === "";
        }

        function mdpIdentique() {
            mdpAreSame = false;
            if (mot_de_passe === mot_de_passe_confirmation) {
                mdpAreSame = true;
                $('#mot_de_passe').css({ 'border': '1px solid #ced4da' });
                $('#mot_de_passe_confirmation').css({ 'border': '1px solid #ced4da' });
                $('#mot_de_passe').attr('placeholder', '');
                $('#mot_de_passe_confirmation').attr('placeholder', '');
            } else {
                $('#mot_de_passe').css({ 'border': '1px solid red' });
                $('#mot_de_passe_confirmation').css({ 'border': '1px solid red' });
                $('#mot_de_passe').val("");
                $('#mot_de_passe_confirmation').val("");
                $('#mot_de_passe').attr('placeholder', 'Mot de passe différents');
                $('#mot_de_passe_confirmation').attr('placeholder', 'Mot de passe différents');
            }
            return mdpAreSame;
        }

        if ((allFieldsComplete() && champMdpVide()) || (allFieldsComplete() && !champMdpVide() && mdpIdentique())) {

            let valeurs = {
                'nom': nom,
                'prenom': prenom,
                'profession': profession,
                'num_adelie': num_adelie,
                'tel': tel,
                'mail': mail,
                'mot_de_passe': mot_de_passe,
                'nom_cabinet': nom_cabinet,
                'numero': numero,
                'type_de_voie': type_de_voie,
                'adresse': adresse,
                'code_postal': code_postal,
                'ville': ville,
                'departement': departement,
                'pays': pays
            };
            console.log(valeurs)

            $.ajax({
                type: 'POST',
                url: './?controller=ajax&task=updateProfilPraticien',
                data: valeurs,
                error: function () {
                    alert('Erreur sur PHP !');
                },
                success: function (res) {
                    window.location.href = '?controller=praticien&task=profilPraticienRefonte';
                },
                complete: function () {
                }
            });


        }



    })



});