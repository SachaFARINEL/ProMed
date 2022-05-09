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

    $('#test').on('click', function (e) {
        console.log("test")
    }
    );
});
    // });
    // $('.read_more_btn').on('click', function (e) {
    //     $('#' + this.id).html(
    //         '<input type="date" class="form-control" name="date_naissance" id="date_naissance" required></input>' +
    //         '</br>' +
    //         '<input type="select"></input>' +
    //         '</br>' +
    //         '<button type="button" class="read_more_btn">Valider le rendez-vous</button>'
    //     )

    // });
