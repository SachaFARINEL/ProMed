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
            success: function (res) {
                if (res === 'err') {
                    $('#content').html("Erreur de traitement !");
                } else {
                    $('#content').html(res);
                }
            },
            complete: function () {
            }
        });
    });

});