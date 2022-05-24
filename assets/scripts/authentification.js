$(function () {

    $('.btn').on('click', function () {
        checkAuth()
    })

    $('#mdpSent').keypress(function (e) {
        var key = e.which;
        if (key == 13)  // the enter key code
        {
            checkAuth();
        }
    });

    function checkAuth() {
        let valeurs = {
            "mail": $('#emailSent').val(),
            "mot_de_passe": $('#mdpSent').val(),
        };


        if (!valeurs.mail) {
            $('#emailSent').css({ 'border': '1px solid red' });
            $('#emailSent').attr('placeholder', 'Veuillez indiquer votre mail');
        }

        if (!valeurs.mot_de_passe) {
            $('#mdpSent').css({ 'border': '1px solid red' });
            $('#mdpSent').attr('placeholder', 'Veuillez indiquer votre mot de passe');
        }

        if (valeurs.mail && valeurs.mot_de_passe) {

            $('#emailSent').css({ 'border': '1px solid #ced4da' });
            $('#mdpSent').css({ 'border': '1px solid #ced4da' });
            $('#emailSent').attr('placeholder', 'Entrez votre e-mail');
            $('#mdpSent').attr('placeholder', 'Entrez votre mot de passe');

            let searchParams = new URLSearchParams(window.location.search);
            let getParam = searchParams.get('controller');
            let controller = undefined;
            let espace = undefined;
            if (getParam == 'praticien') {
                controller = './?controller=praticien&task=auth'
                espace = '?controller=praticien&task=showEspace'
            } else {
                controller = './?controller=patient&task=auth'
                espace = '?controller=patient&task=showEspace'
            }

            $.ajax({
                type: 'POST',
                url: controller,
                data: valeurs,
                error: function () {
                    alert('Erreur sur PHP !');
                },
                success: function (res) {

                    if (res === 'errMDP') {
                        $('#mdpSent').val('');
                        $('#emailSent').val('');
                        $('#mdpSent').css({ 'border': '1px solid red' });
                        $('#mdpSent').attr('placeholder', 'Mot de passe incorrect');

                    } else if (res === 'errMail') {
                        $('#mdpSent').val('');
                        $('#emailSent').val('');
                        $('#emailSent').css({ 'border': '1px solid red' });
                        $('#emailSent').attr('placeholder', 'E-mail incorrect');
                    } else {
                        window.location.href = espace
                    }
                },
                complete: function () {
                }
            });

        }
    }
});