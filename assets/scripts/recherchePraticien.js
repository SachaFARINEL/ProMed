$(function () {

    let allData = $('#listePraticiens').html();
    $('#content').hide();

    $('#search').on('propertychange input', function (e) {
        e.preventDefault();
        $('#listePraticiens').hide();
        $('#content').show();
        $('#listePraticiens').html(' ').val();
        
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

});