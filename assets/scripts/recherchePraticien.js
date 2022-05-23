$(function () {

    let allData = $('#content').html();



    $('#search').on('propertychange input', function (e) {
        e.preventDefault();

        if ($('#search').val()) {

            let valeurs = {
                "userData": $('#search').val(),
            };

            $.ajax({
                type: 'POST',
                url: './?controller=ajax&task=rechercherUnPraticien',
                data: valeurs,
                error: function () {
                    alert('Erreur sur PHP !');
                },
                success: function (res) {

                    if (res === 'err') {
                        $('#content').html("Erreur de traitement !");
                    } else {
                        if (res !== undefined) {

                            $('#content').html(res);
                        }
                    }
                },
                complete: function () {
                }
            });

        } else {
            $('#content').html(allData);
            // $('#content').empty();
        }
    });

    // $(document).on('click', '.read_more_btn', function () {
    //     let id = $(this).attr("id")
    //     let valeurs = {
    //         "id": $(this).attr("id"),
    //     };
    //     $.ajax({
    //         type: 'POST',
    //         url: './?controller=ajax&task=prestationsDuPraticien',
    //         data: valeurs,
    //         error: function () {
    //             alert('Erreur sur PHP !');
    //         },
    //         success: function (res) {

    //             if (res === 'err') {
    //                 $('#rdvPossible' + id).html("Erreur de traitement !");
    //             } else {
    //                 if (res) {
    //                     $('#rdvPossible' + id).html(res);
    //                 }
    //             }
    //         },
    //         complete: function () {
    //         }
    //     });

    // });

    // $(document).on('change', '.prestations', function () {
    //     $('.prix').html(' ');
    //     if ($('select').val()) {
    //         $('.prix').html('Prix de la prestation : ' + this.value + '€')
    //     };
    // });

    // $(document).on('change', '.inputDate', function () {
    //     // $(this).on('change', function () {

    //     let idInput = $(this).attr("id")

    //     let idPraticien = idInput.substr(-1);
    //     // let idPraticien = 6;

    //     if ($('#' + idInput).val()) {

    //         let valeurs = {
    //             "dateDesiree": $('#' + idInput).val(),
    //             "idPraticien": idPraticien,
    //         };


    //         $.ajax({
    //             type: 'POST',
    //             url: './?controller=ajax&task=rendezVousDisponibles',
    //             data: valeurs,
    //             error: function () {
    //                 alert('Erreur sur PHP !');
    //             },
    //             success: function (res) {

    //                 if (res === 'err') {

    //                 } else {
    //                     if (res) {
    //                         $('#resultat' + idPraticien).html(res);
    //                     }
    //                 }
    //             },
    //             complete: function () {
    //             }
    //         });
    //     }
    //     // });
    // });

    $(document).on('click', '.read_more_btn', function () {
        let id = ($(this).attr("id"));
        let valeurs = {
            "id": id,
        };
        $.ajax({
            type: 'POST',
            url: './?controller=ajax&task=remplisLaModal',
            data: valeurs,
            error: function () {
                alert('Erreur sur PHP !');
            },
            success: function (res) {

                if (res === 'err') {
                    $('#ex1').html("Erreur de traitement !");
                } else {
                    if (res) {
                        $('#ex1').html(res);
                    }
                }
            },
            complete: function () {
            }
        });
    });

    $(document).on('propertychange input', '.inputDate', function () {

        // let idInput = $(this).attr("id");
        // let idPraticien = idInput.substr(-1);
        idPraticien = ($('.inputDate').attr("id")).split("-");
        idPraticien = idPraticien[1];
        console.log($(this).attr("id"))
        let valeurs = {
            "dateDesiree": $('#' + $(this).attr("id")).val(),
            "idPraticien": idPraticien,
        };

        let dateDecoupee = ($('#' + $(this).attr("id")).val()).split("-");
        let DateOrdonee = dateDecoupee[2] + "/" + dateDecoupee[1] + "/" + dateDecoupee[0]
        $('#dateRdv').html(DateOrdonee);

        $.ajax({
            type: 'POST',
            url: './?controller=ajax&task=rendezVousDisponibles',
            data: valeurs,
            error: function () {
                alert('Erreur sur PHP !');
            },
            success: function (res) {

                if (res === 'err') {
                    $('#resultat').html("Erreur de traitement !");
                } else {
                    if (res) {
                        $('#selectH').html(res);
                    }
                }
            },
            complete: function () {
            }
        });
    });


    // $('.testPresta').on('propertychange input', function () {
    //     console.log('yesy')
    //     $('select').change(function () {
    //         alert($(this).children('option:selected').data('id'));
    //     });

    // });
    $(document).on('propertychange input', '.prestations', function () {
        nomPrestation = $(this).find(':selected').text();
        prixPrestation = $(this).find(':selected').val();
        prixPrestation = prixPrestation.split('-');
        if (prixPrestation != 'null') {
            $('#prestationNom').html(nomPrestation);
            $('#prestationPrix').html(', ' + prixPrestation[1] + ' €');
        } else {
            $('#prestationNom').html("");
            $('#prestationPrix').html("");
        }
        return prixPrestation

    });

    $(document).on('propertychange input', '.heures', function () {
        heurePrestation = $(this).find(':selected').text();
        if ($(this).find(':selected').val() != "null") {
            $('#heureRdv').html(heurePrestation + ", le ");
        } else {
            $('#heureRdv').html("");
        }


    });


    $(document).on('click', '#sendRdv', function () {
        valeurPresta = $('#testPresta').find(':selected').val();
        valeurDate = $('#heures').find(':selected').val();

        if (valeurPresta == 'null' || valeurDate == 'null') {
            $('#sendRdv').html('Veuillez remplir tous les champs')
            $('#containerModal').css({ 'border': '2px solid red' })

        } else {
            $('#containerModal').css({ 'border': '1px solid white' })
            $('#sendRdv').html('Valider le rendez-vous')
            idPraticien = ($('.inputDate').attr("id")).split("-");
            idPraticien = idPraticien[1];


            let valeurs = {
                "idPraticien": idPraticien,
                "idPrestation": prixPrestation[0],
                "date": $('.inputDate').val() + ' ' + $('.heures').val() + ':00',
                "isAnnule": 0,
                "is_presentiel": 0,
            };

            $.ajax({
                type: 'POST',
                url: './?controller=ajax&task=enregistrerRdv',
                data: valeurs,
                error: function () {
                    alert('Erreur sur PHP !');
                },
                success: function (res) {
                    $('#containerModal').css({ 'border': '2px solid green' });
                    $('#sendRdv').html('Rendez-vous programmé')
                    $('#sendRdv').prop('disabled', true)

                    if (res === 'err') {
                        $('#resultat').html("Erreur de traitement !");
                    } else {
                        if (res) {

                            $('.recap').html(res);
                        }
                    }
                },
                complete: function () {
                }
            });

        }
    });





});

