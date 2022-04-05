$(function () {

    $('#loginform').on('submit', function (e) {
        e.preventDefault();

        let $error = $('#error');
        let search = $('#search').val();
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
            success: function (retour) {
                if (retour === 'err') {
                    $('#content').html("Erreur de traitement !");
                } else {
                    $('#content').html(retour);
                }
            },
            complete: function () {
                console.log('complete')
            }
        });
    });

});