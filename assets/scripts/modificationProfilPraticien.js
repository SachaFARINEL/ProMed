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


    $(document).on('click', '.editPresta', function () {
        let id = (($(this).attr("id")).split("-"))[1];
        let libelle = $('#libelle-' + id).text();
        let prix = $('#prix-' + id).text();
        let description = $('#description-' + id).text();
        let oldPresta = $('#presta-' + id).html();

        $('#presta-' + id).empty()
        $('#presta-' + id).html(
            `<h6>
                <span class="text-muted" style="text-decoration: underline"> Libelle</span> :
                <input type="text" id="newLibelle-${id}" value="${libelle}">
            </h6>
            <h6>
                <span class="text-muted" style="text-decoration: underline"> Prix</span> :
                <input type="text" id="newPrix-${id}" value="${prix}"> 
            </h6>
            <h6>
                <span class="text-muted" style="text-decoration: underline"> Description</span> :
                <input type="text" id="newDescription-${id}" value="${description}">
            </h6>
            <h6 style="text-align: center">
                <img src="./assets/images/check.png" alt="avatar" id="check-${id}" class="parametresFiche img-fluid" style="width: 5%">
                <img src="./assets/images/close.png" alt="avatar" id="close-${id}" class="parametresFiche img-fluid" style="width: 5%"></img>
            </h6>
            `
        );

        $("#close-" + id).on('click', function () {
            $('#presta-' + id).empty()
            $('#presta-' + id).html(oldPresta)
        })

        $("#check-" + id).on('click', function () {
            newLibelle = $('#newLibelle-' + id).val();
            newPrix = $('#newPrix-' + id).val();
            newDescription = $('#newDescription-' + id).val();

            let valeurs = {
                'id': id,
                'nom_prestation': newLibelle,
                'prix': newPrix,
                'description': newDescription
            };

            $.ajax({
                type: 'POST',
                url: './?controller=ajax&task=updatePrestation',
                data: valeurs,
                error: function () {
                    alert('Erreur sur PHP !');
                },
                success: function (res) {
                    $('#presta-' + id).html(
                        `<h6>
                            <span class="text-muted" style="text-decoration: underline"> Libelle</span> :
                            <span id="libelle-${id}">${newLibelle}</span>
                            <img src="./assets/images/editPresta.png" alt="avatar" id="imgPresta-${id}" class="editPresta img-fluid" style="width: 5%">
                        </h6>
                        <h6>
                            <span class="text-muted" style="text-decoration: underline"> Prix</span> :
                            <span id="prix-${id}">${newPrix}</span> €
                        </h6>
                        <h6>
                            <span class="text-muted" style="text-decoration: underline"> Description</span> :
                            <span id="description-${id}">${newDescription}</span>
                        </h6>
                        `
                    );

                },
                complete: function () {
                }
            });

        })

    });





});