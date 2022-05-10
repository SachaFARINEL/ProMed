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
        }
    });


    $(document).on('click', '.read_more_btn', function () {
        id = $(this).attr("id")
        let valeurs = {
            "id": $(this).attr("id"),
        };
        $.ajax({
            type: 'POST',
            url: './?controller=ajax&task=prestationsDuPraticien',
            data: valeurs,
            error: function () {
                alert('Erreur sur PHP !');
            },
            success: function (res) {

                if (res === 'err') {
                    $('#rdvPossible + id').html("Erreur de traitement !");
                } else {
                    if (res !== undefined) {
                        $('#rdvPossible' + id).html(res);
                    }
                }
            },
            complete: function () {
                console.log('terminé')
            }
        });

    });

    $(document).on('change', '.prestations', function () {
        $('.prix').html(' ');
        if ($('select').val()) {
            $('.prix').html('Prix de la prestation : ' + this.value + '€')
        };
    });



});
