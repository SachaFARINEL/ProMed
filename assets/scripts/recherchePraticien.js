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


    // $('.read_more_btn').on('click', function () {
    $(document).on('click', '.read_more_btn', function () {
        console.log(($(this).attr("id")))
        // console.log($('#rdvPossible' + id).val())
        // $('#rdvPossible' + id).html('test' + id)



    });



});
