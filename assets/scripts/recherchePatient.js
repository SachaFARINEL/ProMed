$(function () {

    let allData = $('#listePatients').html();
    $('#content').hide();

    $('#search').on('propertychange input', function (e) {
        e.preventDefault();
        $('#listePatients').hide();
        $('#content').show();
        $('#listePatients').html(' ').val();

        if ($('#search').val()) {

            let valeurs = {
                "userData": $('#search').val(),
            };

            $.ajax({
                type: 'POST',
                url: './?controller=ajax&task=rechercherUnPatient',
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
        // alert('cc');
        // return false;
        // let id = $(this).attr("id")
        let valeurs = {
            "id": $(this).attr("id"),
        };

        $.ajax({
            type: 'POST',
            url: './?controller=praticien&task=pagePatientPdvPraticien',
            data: valeurs,
            error: function () {
                alert('Erreur sur PHP !');
            },
            success: function (res) {

                if (res === 'err') {
                } else {
                    if (res) {
                        console.log(res)
                    }

                }
            },
            complete: function () {
            }
        })
    })
});