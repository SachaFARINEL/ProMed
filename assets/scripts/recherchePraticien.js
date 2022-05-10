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
        let id = ($(this).attr("id")).substr(-1);
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

        let idInput = $(this).attr("id");
        let idPraticien = idInput.substr(-1);
        let valeurs = {
            "dateDesiree": $('#' + idInput).val(),
            "idPraticien": idPraticien,
        };
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
                        $('#resultat').html(res);
                    }
                }
            },
            complete: function () {
            }
        });
    });


});

